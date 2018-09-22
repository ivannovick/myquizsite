<?php
    include_once('components/header.php');
    if ($qid == -1)
    {
        return;
    }
    if (!$answers)
    {
        echo "no valid answers for question id '$qid' thisquestion '$this_question' next_qid '$next_qid'\n";
        return;
    }
?>
        <div class='qmain'>
	    <div class='content'>
                <?php
                    $form = "<div>\n";
                    $form .= "<p class='myspan'>Question #$current_order: <b>$question</b><br />\n";
            if ($sample_code) $form .= "<p><pre class='codesample'><code>$sample_code</code></pre></p>\n";
            $form .= "</div>\n";
            $form .= "<form id='qform' class='form-question'  name='qform' method='post' action='question.php'>\n";
            foreach ($answers as $key => $value) {
                if ($value != '') {
                    $color = '';
                    $extra = '';
                    if ($answer == $key) {
                        $color = ($answer == $correct_answer) ? 'color:green' : 'color:red';
                        $newColor = ($answer == $correct_answer) ? 'color:green;font-weight: bold' : '';
                        $extra = ($answer == $correct_answer) ? ' - <b>correct</b>' : ' - <b>incorrect</b>';
                    }
                    $form .= "<div class='form-answer'><input type='radio' name='answer' id='$key' value='$key'/>";
                    $form .= "<span class='myspan' style='$color'><label for='$key'>$value</label> <span id=extra>$extra</span></span></div>\n";
                }
            }
            if ($description && $answer) {
                $form .= "<p class='description'><b style='display: block'>description: </b> $description</p>\n";
            }
            $form .= "<div><div style='display:inline-block'><input class='submit' type='submit' value='Submit Answer' /></div>";
            $form .= "<input type='hidden' name='qid' value='$qid'/>";
            $form .= "</form>";
                    echo $form;
            if ($next_qid){
                echo "<div class='next-question'><a class='next-question-text' style='$newColor' href='question.php?qid=$next_qid'>Next Question</a></div>";
            }
           ?>
            </div><!-- class content -->
        </div>

            <div id='gqad'>
                <?php include('components/google_ad_question.php') ?>
            </div>
        </div>
    </main>
    <?php include('components/footer.php') ?>
    <?php include('components/google_analytics.php'); ?>
</body>
</html>
