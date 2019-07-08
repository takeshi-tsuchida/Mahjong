<?php

namespace App\Http\Controllers;

use App\Repositories\StudyRepository;
use DB;
use Request;

/**
 * 学習用ページに関するコントローラクラス
 * @package App\Http\Controllers
 */
class StudyController extends BaseHtmlController
{
    /**
     * 学習ページ表示アクション
     * @return \Illuminate\Http\Response レスポンスインスタンス
     */
    public function getIndex()
    {
        return $this->getView();
    }

    /**
     * 学習内容登録画面表示アクション
     * @return \Illuminate\Http\Response レスポンスインスタンス
     */
    public function getCreate()
    {
        return $this->getView();
    }

    /**
     * 学習内容登録実行アクション
     * @param Request $request リクエストインスタンス
     * @return \Illuminate\Http\RedirectResponse リダイレクトインスタンス
     */
    public function postCreate(Request $request)
    {
        $inputs = $request::all();
        $attributes = [
            'studied_at' => $inputs['studied_at'],
            'study_summary' => $inputs['study_summary'],
            'study_detail' => $inputs['study_detail'],
            'study_time' => $inputs['study_time'],
            'study_status' => $inputs['study_status'],
            'important_flag' => $inputs['important_flag'],
        ];

        $study_id = DB::transaction(function () use ($attributes) {
            return StudyRepository::save($attributes);
        });

        return redirect("/study/{$study_id}/edit");
    }

    /**
     * 学習内容編集画面表示アクション
     * @param int $study_id 学習内容ID
     * @return \Illuminate\Http\Response レスポンスインスタンス
     */
    public function getEdit(int $study_id)
    {
        $study = StudyRepository::getDetailById($study_id);

        return $this->getView([
            'study' => $study,
        ]);
    }

    /**
     * 学習内容編集実行アクション
     * @param Request $request リクエストインスタンス
     * @param int $study_id 学習内容ID
     * @return \Illuminate\Http\RedirectResponse リダイレクトインスタンス
     */
    public function postEdit(Request $request, int $study_id)
    {
        $inputs = $request::all();
        $attributes = [
            'studied_at' => $inputs['studied_at'],
            'study_summary' => $inputs['study_summary'],
            'study_detail' => $inputs['study_detail'],
            'study_time' => $inputs['study_time'],
            'study_status' => $inputs['study_status'],
            'important_flag' => $inputs['important_flag'],
        ];

        DB::transaction(function () use ($attributes, $study_id) {
            StudyRepository::update($attributes, $study_id);
            return;
        });

        return redirect("/study/{$study_id}/edit");
    }
}
