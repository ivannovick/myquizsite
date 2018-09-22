<?php
    include_once('components/header.php');
?>
<?php
    $query = "SELECT question.id, question.keyword, question.`order` FROM question WHERE question.language = $language_id order by `order` ASC";

    echo"<div class='question-container'><h3 class='question'>Question</h3>\n";

    $result = mysql_query($query) or error_log(mysql_error());
    $num_rows = mysql_num_rows($result);
    $counter = 0;
    while ($row = mysql_fetch_assoc($result)) {
        $counter++;
        if ($counter == 20 || $counter == 60) {
            echo"<div>";
            include('components/google_ad_list.php');
            echo "</div>\n";
        }
        $rs_qid = $row["id"];
        $rs_order = $row["order"];
        $rs_keyword = $row["keyword"];

        echo "<div class='question'><a href='question.php?qid=$rs_qid' class='more'>$rs_order: $rs_keyword</a></div>\n";
    }
    echo "</div>";
?>

    </main> <!-- maincontent -->

    <?php include('components/footer.php') ?>
    <?php include('components/google_analytics.php'); ?>
</body>
</html>
