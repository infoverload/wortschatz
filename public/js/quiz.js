(function() {

    var questions = [];
    var arr = $.map(words, function(el) { 
        questions.push({
            question: el.body, 
            correctAnswer: el.gender
        });
        return questions; 
    });
 
    var questionCounter = 0; // tracks question number
    var selections = [];     // array containing user choices
    var quiz = $('#quiz');   // quiz div object
 
    $('#start').hide();
    // display initial question
    displayNext();

    // displays next requested element
    function displayNext() {

        quiz.fadeOut(function() {

            $('#question').remove();
            
            if(questionCounter < questions.length) {

                var nextQuestion = createQuestionElement(questionCounter);
                quiz.append(nextQuestion).fadeIn();
              
                if(questionCounter === 0){              
                    $('#next').show();
                }
            }
            else {
                var scoreElem = displayScore();
                quiz.append(scoreElem).fadeIn();
                $('#next').hide();
                $('#start').show();
            }
        });

    }

    // click handler for the 'next' button
    $('#next').on('click', function(e) {
        e.preventDefault();

        var checked = $('input[name="answer"]:checked').val();
   
        // reads the user selection and pushes the value to an array
        if (checked !== undefined) {
            selections.push(checked);
        }

        if (checked === undefined) {
            alert('Please make a selection');
        } 
        else {
            questionCounter++;
            displayNext();
        }
    });

    // Click handler for the 'Start Over' button
    $('#start').on('click', function (e) {
        e.preventDefault();
        questionCounter = 0;
        selections = [];
        displayNext();
        $('#start').hide();
    });

    // creates and returns the div that contains the questions and the answer selections
    function createQuestionElement(index) {
        var qElement = $('<div>', {id: 'question'});       
        var question = $('<p>').append(questions[index].question);
        qElement.append(question);       
        var radioButtons = $('<div id="answer"><input type="radio" name="answer" value="Der">Der<input type="radio" name="answer" value="Die">Die<input type="radio" name="answer" value="Das">Das</div>');
        qElement.append(radioButtons);
        
        return qElement;        
    }
      
    // computes score and returns a paragraph element to be displayed
    function displayScore() {
        var score = $('<p>',{id: 'question'});      
        var numCorrect = 0;
        for (var i = 0; i < selections.length; i++) {
            if (selections[i] === questions[i].correctAnswer) {
                numCorrect++;
            }
        }      
        score.append('You got ' + numCorrect + ' out of ' + questions.length + ' right');

        return score;
    }

})();