-- prefectureテーブル作成
CREATE TABLE prefecture (
    prefecture_id VARCHAR(2) NOT NULL,
    name VARCHAR(10) NOT NULL,
    PRIMARY KEY (prefecture_id)
);


-- cityテーブル作成
CREATE TABLE city (
    citycode VARCHAR(10) NOT NULL,
    name VARCHAR(50) NOT NULL,
    PRIMARY KEY (citycode)          -- 重複を避けるためcitycodeを主キーに
);

-- 県ごとの市区町村数を調べるためprefecture_idを追加
ALTER TABLE city ADD COLUMN prefecture_id VARCHAR(2);
