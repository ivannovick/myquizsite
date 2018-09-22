<?php
  include_once('components/mysql_connect.php');  
  $qid = $_REQUEST['qid'];

  function null_or_quote_and_escape($str) {
    if ($str == '') return 'NULL';
    return "'" . mysql_real_escape_string($str) . "'";
  }

  if ($_POST) {
    $question = null_or_quote_and_escape($_POST['question']);
    $correct = null_or_quote_and_escape($_POST['correct']);
    $answera = null_or_quote_and_escape($_POST['answera']);
    $answerb = null_or_quote_and_escape($_POST['answerb']);
    $answerc = null_or_quote_and_escape($_POST['answerc']);
    $answerd = null_or_quote_and_escape($_POST['answerd']);
    $answere = null_or_quote_and_escape($_POST['answere']);
    $description = null_or_quote_and_escape($_POST['description']);
    $code = null_or_quote_and_escape($_POST['code']);
    $keyword = null_or_quote_and_escape($_POST['keyword']);
    $language = $_POST['language'];
    $order = $_POST['order'];
    $nextqid = $_POST['nextqid'];
    $author = null_or_quote_and_escape($_POST['author']);

    if ($qid) {
      $query = "update question set question=$question, correct=$correct, answera=$answera, answerb=$answerb"
        . ", answerc=$answerc, answerd=$answerd, answere=$answere, description=$description, code=$code"
        . ", keyword=$keyword, language=$language, question.order=$order, nextqid=$nextqid, author=$author where id=$qid";
      //error_log("Query: " . $query);
      mysql_query($query) or error_log(mysql_error());
    } else {
      $query = "insert into question values ("
        . "NULL, $question, $correct, $answera, $answerb, $answerc, $answerd, $answere"
        . ", $description, $code, $keyword, $language, $order, NULL, NULL, $nextqid, $author, 1"
        . ")";
      mysql_query($query) or error_log(mysql_error());
      $qid = mysql_insert_id();
    }
  }

  if ($qid) {
    $query = "select * from question where id = $qid";
    $result = mysql_query($query) or error_log(mysql_error());
    $this_question = mysql_fetch_assoc($result);

    $order = $this_question["order"];
    $question = $this_question["question"];
    $code = $this_question["code"];
    $correct = $this_question["correct"];
    $description = $this_question["description"];
    $answera = $this_question["answera"];
    $answerb = $this_question["answerb"];
    $answerc = $this_question["answerc"];
    $answerd = $this_question["answerd"];
    $answere = $this_question["answere"];
    $nextqid = $this_question["nextqid"];
    $keyword = $this_question["keyword"];
    $language = $this_question["language"];
    $author = $this_question["author"];

  }
  echo "<p>Question ID: $qid";
?>

<div class='qmain'>
  <div class='content'>
    <form id='qform' name='qform' method='post' action='edit.php'>
      <table>
        <tr>
          <label for='language'>Language</label><input type='text' name='language' value='<?php echo $language ?>' size=1>
          <label for='keyword'>Keyword</label><input type='text' name='keyword' value='<?php echo $keyword ?>'>
          <label for='nextqid'>Next Question ID</label><input type='text' name='nextqid' value='<?php echo $nextqid ?>'>
        </tr>

        <tr>
          <td colspan=2>
            <p class='myspan'>Question #<input type='text' name='order' value='<?php echo $order ?>' size=4>:
            <input type='text' name='question' value='<?php echo $question ?>' size=100>

            <p>Code:
            <p><pre class='codesample'><textarea name='code' rows=10 cols=100><?php echo $code ?></textarea></pre></p>
          </td>
        </tr>

        <tr>
          <td width='5%'><input type='radio' name='correct' value='a' <?php if ($correct == 'a') echo 'checked' ?>/></td>
          <td><input type='text' name='answera' value='<?php echo $answera ?>' size=100></td>
        </tr>

        <tr>
          <td width='5%'><input type='radio' name='correct' value='b' <?php if ($correct == 'b') echo 'checked' ?>/></td>
          <td><input type='text' name='answerb' value='<?php echo $answerb ?>' size=100></td>
        </tr>

        <tr>
          <td width='5%'><input type='radio' name='correct' value='c' <?php if ($correct == 'c') echo 'checked' ?>/></td>
          <td><input type='text' name='answerc' value='<?php echo $answerc ?>' size=100></td>
        </tr>

        <tr>
          <td width='5%'><input type='radio' name='correct' value='d' <?php if ($correct == 'd') echo 'checked' ?>/></td>
          <td><input type='text' name='answerd' value='<?php echo $answerd ?>' size=100></td>
        </tr>

        <tr>
          <td width='5%'><input type='radio' name='correct' value='e' <?php if ($correct == 'e') echo 'checked' ?>/></td>
          <td><input type='text' name='answere' value='<?php echo $answere ?>' size=100></td>
        </tr>

        <tr>
          <td colspan='2'>
            <p>Description:
            <p><textarea name='description' rows=10 cols=100><?php echo $description ?></textarea></p>
          </td>
        </tr>

        <tr>
          <td colspan='2'>
            <p><b style='display: block'>Author: </b>
            <input type='text' name='author' size=30 value='<?php echo $author ?>'></p>
          </td>
        </tr>
      </table>

      <div style='clear: both;width:500px;'><input class='submit' type='submit' value='Save' /></div>

      <input type='hidden' name='qid' value='<?php echo $qid ?>'/>
    </form>
  </div><!-- class content -->
</div> 
