<?php

use Illuminate\Database\Migrations\Migration;

class NewMigrations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE VIEW view_articles AS SELECT id, title, slug, description, content FROM articles');

        DB::unprepared('CREATE TRIGGER trigger_articles BEFORE UPDATE ON articles FOR EACH ROW SET NEW.updated_at = NOW()');

        DB::unprepared('CREATE PROCEDURE procedure_article_views_for_user (IN param_user_id INT, OUT param_views_count INT)
                        BEGIN SELECT SUM(views) INTO param_views_count FROM articles WHERE user_id = param_user_id; END');

        DB::unprepared('
            CREATE EVENT event_statistics
            ON SCHEDULE EVERY 1 WEEK STARTS \'2016-06-05 04:00:00\'
            DO BEGIN
                SELECT COUNT(id) INTO @users_count FROM users WHERE is_admin = 1;
                SET @i = 0;
                WHILE @i < @users_count DO
                    SELECT id INTO @id FROM users WHERE is_admin = 1 LIMIT 0,1;
                    CALL procedure_article_views_for_user(@id,@views_count);
                    SELECT @views_count INTO OUTFILE \'/tmp/statistics.txt\');
                    SET @i = @i + 1;
                END WHILE;
            END;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW view_articles');

        DB::unprepared('DROP TRIGGER trigger_articles');

        DB::unprepared('DROP PROCEDURE procedure_article_views_for_user');

        DB::unprepared('DROP EVENT event_statistics');
    }
}
