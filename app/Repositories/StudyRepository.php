<?php

namespace App\Repositories;

use App\Models\Db\StudyContent;

/**
 * Class 学習内容に関するリポジトリークラス
 * @package App\Repositories
 */
class StudyRepository extends BaseRepository
{
    /**
     * データを登録する。
     * @param array $attributes 登録内容
     * @return int 登録データの管理ID
     */
    public static function save(array $attributes): int
    {
        $study_content = new StudyContent($attributes);
        $study_content->save();
        return $study_content->id;
    }

    /**
     * 管理ID指定で詳細を取得する。
     * @param int $id 管理ID
     * @return mixed 検索結果
     */
    public static function getDetailById(int $id)
    {
        return StudyContent::getDetailById($id);
    }

    /**
     * データを更新する
     * @param array $attributes 更新内容
     * @param int $id 管理ID
     */
    public static function update(array $attributes, int $id)
    {
        $study_content = (new StudyContent())->findOrFail($id);
        $study_content->update($attributes);
    }
}
