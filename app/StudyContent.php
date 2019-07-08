<?php

namespace App\Models\Db;

/**
 * 学習内容モデルクラス
 * Class StudyContent
 * @package App\Models\Db
 */
class StudyContent extends BaseDbModel
{
    const PREFIX = STUDY_CODE_PREFIX;

    /**
     * 管理ID指定で詳細を取得する。
     * @param int $id 管理ID
     * @return StudyContent 検索結果
     */
    public static function getDetailById(int $id)
    {
        return self::findOrFail($id);
    }
}
