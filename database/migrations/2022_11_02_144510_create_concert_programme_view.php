<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $sqlStatement  = "CREATE VIEW view_concert_programmes AS ";
        $sqlStatement .= "SELECT ";
        $sqlStatement .= "    p.concert_id, ";
        $sqlStatement .= "    p.order, ";
        $sqlStatement .= "    m.title, ";
        $sqlStatement .= "    m.soloist,  ";
        $sqlStatement .= "    CONCAT(c.lastname, ', ', c.firstname) as composer,  ";
        $sqlStatement .= "    CONCAT(a.lastname, ', ', a.firstname) as arranger, ";
        $sqlStatement .= "    IF( ";
        $sqlStatement .= "        c.lastname != '-' AND c.firstname != '-' AND ";
        $sqlStatement .= "        a.lastname != '-' AND a.firstname != '-', ";
        $sqlStatement .= "        CONCAT(" ;
        $sqlStatement .= "            'Composer: ', ";
        $sqlStatement .= "            CONCAT(c.lastname, ', ', c.firstname), ' / Arranger: ', ";
        $sqlStatement .= "            CONCAT(a.lastname, ', ', a.firstname) ";
        $sqlStatement .= "        ), ";
        $sqlStatement .= "        IF( ";
        $sqlStatement .= "            c.lastname != '-' AND c.firstname != '-' , ";
        $sqlStatement .= "            CONCAT(" ;
        $sqlStatement .= "                'Composer: ', ";
        $sqlStatement .= "                CONCAT(c.lastname, ', ', c.firstname)), ";
        $sqlStatement .= "                IF( ";
        $sqlStatement .= "                    a.lastname != '-' AND a.firstname != '-' , ";
        $sqlStatement .= "                    CONCAT('Arranger: ', CONCAT(a.lastname, ', ', a.firstname) ";
        $sqlStatement .= "                ), ";
        $sqlStatement .= "                '' ";
        $sqlStatement .= "            ) ";
        $sqlStatement .= "        ) ";
        $sqlStatement .= "    ) as CompArrStr, ";
        $sqlStatement .= "    s.style ";
        $sqlStatement .= "FROM ";
        $sqlStatement .= "    programmes AS p ";
        $sqlStatement .= "    JOIN music AS m ON p.music_id = m.id ";
        $sqlStatement .= "    JOIN composers AS c ON m.composer_id = c.id ";
        $sqlStatement .= "    JOIN composers AS a ON m.arranger_id = a.id ";
        $sqlStatement .= "    JOIN styles AS s ON m.style_id = s.id;";

        \DB::statement($sqlStatement);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $sqlStatement = "DROP VIEW IF EXISTS `view_concert_programmes`;";
        \DB::statement($sqlStatement);
    }
};
