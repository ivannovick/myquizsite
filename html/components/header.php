<?php
    error_reporting(E_ERROR);
    $orig_qid = $_REQUEST['qid'];
    $qid = (int)$orig_qid;
    if ($qid != $orig_qid){
        $qid = -1;
    }

    $answer = $_REQUEST['answer'];

    include_once('mysql_connect.php');
    include_once('language.php');
    $language = new Language;
    $language_id = $language->get_num();

    session_start();
    $current = null;

    // get the firstid
    $query = "select id from question where language = $language_id order by id limit 1";
    $result = mysql_query($query);
    $row = mysql_fetch_assoc($result);
    $firstid = $row["id"];

    if ($qid){
        $query = "select * from question where id = $qid";
        $result = mysql_query($query) or error_log(mysql_error());
        $this_question = mysql_fetch_assoc($result);
        $next_qid = $this_question["nextqid"];
        $current_order = $this_question["order"];
        $question = $this_question["question"];
        $sample_code = $this_question["code"];
        $correct_answer = $this_question["correct"];
        $description = $this_question["description"];
        $answers['a'] = $this_question["answera"];
        $answers['b'] = $this_question["answerb"];
        $answers['c'] = $this_question["answerc"];
        $answers['d'] = $this_question["answerd"];
        $answers['e'] = $this_question["answere"];
    }
?>
<!DOCTYPE html>
<html class="no-js" lang="en" dir="ltr">
<?php include('html_head.php') ?>
<body>
 <main class="mainContent" role="main">
    <header class="header">
        <h1 class="header-title">My <?= $language->get_normalized_name() ?> Quiz</h1>
        <h2 class="header-subtitle">The ultimate place to learn <?= $language->get_normalized_name() ?>!</h2>
    </header> <!-- header -->
    <nav class='nav'>
        <?php
            echo "<a class='more' href='/' title='Home'>&#8962;</a>";
            echo "&nbsp;| <a class='more' href='question.php?qid=$firstid'>Start Quiz</a>";
            echo "&nbsp;| <a class='more' href='list.php'>List of questions</a> ";
            echo "&nbsp;| <a class='more' href='programmingquizes.php'>Other Quizes</a>";
            echo "\n";
    ?>
</nav>
