<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Grade;
use App\Models\Team;
use App\Models\TeamHasCourse;
use App\Models\TeamHasUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPSTORM_META\map;
use Spatie\Permission\Models\Role;

class GradesController extends Controller
{
    /**
     * 说明: 返回当前老师的代课列表信息
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 赵艺
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $courses = Course::where('teacher_id', $user->id)->get();

        if (empty($request->course_id))
            return view('grades.index', ['StatusCode' => 400, 'ResultData' => '请选择所带课程', 'courses' => $courses, 'teams' => collect([])]);
        $teamHasCourses = TeamHasCourse::where(['course_id' => $request->course_id, 'semester' => $request->semester ?? 1])
            ->pluck('team_id')
            ->toArray();
        $teams = Team::find($teamHasCourses);

        if (empty($request->team_id))
            return view('grades.index', ['StatusCode' => 400, 'ResultData' => '请选择所属班级', 'courses' => $courses, 'teams' => $teams]);

        $role = Role::where('name', 'student')->first();
        $studentIds = $role->users->pluck('id')->toArray();
        $studentIds = TeamHasUser::where(['team_id' => $request->team_id])
            ->whereIn('user_id', $studentIds)
            ->pluck('user_id')
            ->toArray();

        $students = User::find($studentIds)->map(function ($student) use ($request) {
            $grade = Grade::where([
                'student_id' => $student->id,
                'course_id' => $request->course_id,
                'semester' => $request->semester ?? 1
            ])->first();

            $student->grade = $grade->grade ?? null;
            $student->grade_id = $grade->id ?? null;
            return $student;
        });

        if (empty($students->count()))
            return view('grades.index', ['StatusCode' => 204, 'ResultData' => '该班级下暂无学生', 'courses' => $courses, 'teams' => $teams]);
        return view('grades.index', ['StatusCode' => 200, 'ResultData' => $students, 'courses' => $courses, 'teams' => $teams]);
    }

    /**
     * 说明: 添加成绩视图
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 赵艺
     */
    public function create()
    {
        return view('grades.create');
    }

    /**
     * 说明: 我的成绩
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 赵艺
     */
    public function show(Request $request)
    {
        $where['semester'] = $request->semester ?? 1;
        $where['student_id'] = Auth::user()->id;
        $grades = Grade::where(array_filter($where))->with('course')->get();
        return view('grades.show', ['grades' => $grades]);
    }

    /**
     * 说明: 下载我的成绩
     *
     * @param Request $request
     * @author 赵艺
     */
    public function myGradeDown(Request $request)
    {
        $where['semester'] = $request->semester ?? 1;
        $where['student_id'] = Auth::user()->id;
        $grades = Grade::where(array_filter($where))->with('course')->get();

        // 打印成绩单
    }

    /**
     * 说明:
     *
     * @param Request $request
     * @return array
     * @throws \PHPExcel_Exception
     * @throws \PHPExcel_Reader_Exception
     * @author 赵艺
     */
    public function exportGrades(Request $request)
    {
        if ($request->hasFile('file_excel')) {
            $file = $request->file_excel;
            //提取上传后的临时存放地址
            //拼装新的文件名
            $extension = $file->getClientOriginalExtension();
            if ($extension == "xlsx") {
                $objReader = \PHPExcel_IOFactory::createReader('Excel2007');
            } else {
                $objReader = \PHPExcel_IOFactory::createReader('Excel5');
            }
            $objReader->setReadDataOnly(true);
            $objPHPExcel = $objReader->load($file);
            $objWorksheet = $objPHPExcel->getActiveSheet();

            $highestRow = $objWorksheet->getHighestRow();
            $excelData = array();
            for ($row = $request->start_num; $row <= $highestRow; $row++) {
                $excelData[] = [
                    'no' => $objWorksheet->getCellByColumnAndRow(($request->no_num - 1), $row)->getValue(),
                    'name' => $objWorksheet->getCellByColumnAndRow(($request->name_num - 1), $row)->getValue(),
                    'grade' => $objWorksheet->getCellByColumnAndRow(($request->grade_num - 1), $row)->getValue()
                ];
            }
            return response()->json(['StatusCode' => 200, 'ResultData' => $excelData]);
        }
        return response()->json(['StatusCode' => 400, 'ResultData' => '请上传成绩excel文件']);
    }

    /**
     * 说明: 添加导入成绩
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @author 赵艺
     */
    public function storeManyGrades(Request $request)
    {
        $data = $request->data ?? [];
        $fail = [];
        $count = 0;
        foreach ($data as $student) {
            $stu = User::where(['name' => $student['name'], 'no' => $student['no']])->first();
            if (empty($stu)) {
                $fail[] = $student;
                continue;
            }
            $grade = Grade::where([
                'student_id' => $stu->id,
                'course_id' => $request->course_id,
                'semester' => $request->semester,
            ])->first();
            if (empty($grade)) {
                $result = Grade::create([
                    'student_id' => $stu->id,
                    'course_id' => $request->course_id,
                    'semester' => $request->semester,
                    'grade' => $student['grade'],
                ]);
            } else {
                $grade->grade = $student['grade'];
                $result = $grade->save();
            }
            if (empty($result)) {
                $fail[] = $student;
            }
            $count++;
        }

        if (empty($count))
            return response()->json(['StatusCode' => 400, 'ResultData' => '导入失败'. '个,其中包括：' . json_encode($fail)]);
        return response()->json(['StatusCode' => 200, 'ResultData' => '导入成功' . $count . '个;失败' . count($fail) . '个,其中包括：' . json_encode($fail)]);
    }

    /**
     * 说明: 添加成绩操作
     *
     * @param Request $request
     * @return mixed
     * @author 赵艺
     */
    public function store(Request $request)
    {
        $grade = Grade::where([
            'student_id' => $request->student_id,
            'course_id' => $request->course_id,
            'semester' => $request->semester,
        ])->first();
        if (empty($grade)) {
            $result = Grade::create([
                'student_id' => $request->student_id,
                'course_id' => $request->course_id,
                'semester' => $request->semester,
                'grade' => $request->grade,
            ]);
        } else {
            $grade->grade = $request->grade;
            $result = $grade->save();
        }

        if (empty($result))
            return response()->json(['StatusCode' => 500, 'ResultData' => '添加失败']);
        return response()->json(['StatusCode' => 200, 'ResultData' => '添加成功']);
    }

    /**
     * 说明: 修改成绩视图
     *
     * @param User $dean
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 赵艺
     */
    public function edit()
    {

    }

    /**
     * 说明: 修改成绩
     *
     * @param User $dean
     * @param Request $request
     * @return mixed
     * @author 赵艺
     */
    public function update()
    {

    }

    /**
     * 说明: 删除成绩
     *
     * @param Grade $grade
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     * @author 赵艺
     */
    public function destroy(Grade $grade)
    {
        if (empty($grade->delete()))
            return response()->json(['StatusCode' => 500, 'ResultData' => '删除失败']);
        return response()->json(['StatusCode' => 200, 'ResultData' => '删除成功']);
    }
}
