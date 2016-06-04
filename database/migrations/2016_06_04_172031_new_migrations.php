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
        DB::statement('CREATE VIEW view_articles AS SELECT id, title, slug, description, content FROM articles');

        DB::statement('CREATE TRIGGER trigger_articles BEFORE UPDATE ON articles FOR EACH ROW SET NEW.updated_at = NOW()');

        DB::statement('CREATE PROCEDURE procedure_article_views_for_user (IN param_user_id INT, OUT param_views_count INT)
                        BEGIN SELECT SUM(views) INTO param_views_count FROM articles WHERE user_id = param_user_id; END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW view_articles');

        DB::statement('DROP TRIGGER trigger_articles');

        DB::statement('DROP PROCEDURE procedure_article_views_for_user');
    }
}
