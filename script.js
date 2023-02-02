/*Software Engineering Group Project 03: index.html/(Release)*/
/* Quiz Question Dropdown Button*/ 
function myFunction() {
  document.getElementById("my-dropdown").classList.toggle("show");
}

/*Close the dropdown if the user clicks outside of it*/
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

//this allows the user to select how many questions they want for the quiz

function addQuestionArea() {
  //add a for loop here to iterate through the below code x amount of times for the value of the drop down
  //making all of the variables so they can change value based on drop down selection

  var parentDiv; 
  var targetContainerMain; 
  var targetContainerQuestion;
  var questionsForm;
  var targetForm;
  var questionDiv; 
  var typeOfQLabel;
  var select;
  var targetSelectOne;
  var questionOptionOne;
  var targetSelectTwo;
  var questionOptionTwo ;
  var questionNameContainer;
  var targetContainerQText;
  var questionTextLabel;
  var questionTextInput;
  var answersTargetContainer;
  var answerTextLabelOne;
  var answerTextLabelTwo;
  var answerTextLabelThree;
  var answerTextLabelFour;
  var answerDivs;
  var answerCheckboxesOne;
  var answerCheckboxesTwo;
  var answerCheckboxesThree;
  var answerCheckboxesFour;
  var answerTextInputOne;
  var answerTextInputTwo;
  var answerTextInputThree;
  var answerTextInputFour;
 

  //This creates all of the divs and forms etc to allow for the user to input the type of question, and the answer for such as question

  //Main parent container
  parentDiv = document.createElement('div')
  parentDiv.id = "main-questions-container";
  // parentDiv.innerHTML = "main container test text";
  parentDiv.className = 'quiz-questions-container';
  document.body.appendChild(parentDiv);
  
  //form container
  targetContainerMain = document.getElementById('main-questions-container');
  questionsForm = document.createElement('form');
  questionsForm.id = "questions-form-id";
  // questionsForm.innerHTML="form container";
  questionsForm.action="";
  questionsForm.method="";
  targetContainerMain.appendChild(questionsForm);

  //type of question div
  targetForm = document.getElementById('questions-form-id');
  questionDiv = document.createElement('div');
  questionDiv.id = "form-group-id";
  questionDiv.className = "form-group";
  // div2.innerHTML="div2 container";
  targetForm.appendChild(questionDiv);

  //type of question label
  targetContainerQuestion = document.getElementById('form-group-id');
  typeOfQLabel = document.createElement('label');
  typeOfQLabel.id = "typ-of-q-id";
  typeOfQLabel.className = "type-of-question";
  typeOfQLabel.innerHTML = "Type of Question";
  targetContainerQuestion.appendChild(typeOfQLabel);

  //type of question drop down
  select = document.createElement('select');
  select.type = "text"
  select.id = "select-id";
  select.className = "quiz-name-form-control";
  select.setAttribute('required', '');
  targetContainerQuestion.appendChild(select);

  //type of question option 1 
  targetSelectOne = document.getElementById('select-id');
  questionOptionOne = document.createElement('option');
  questionOptionOne.innerHTML = "Multiple Choice";
  targetSelectOne.appendChild(questionOptionOne);

  //type of question option 2
  targetSelectTwo = document.getElementById('select-id');
  questionOptionTwo = document.createElement('option');
  questionOptionTwo.innerHTML = "True or False";
  targetSelectTwo.appendChild(questionOptionTwo);

  //question text container
  questionNameContainer = document.createElement('div');
  questionNameContainer.id = "question-name-container-id";
  questionNameContainer.className = "form-group";
  // questionNameContainer.innerHTML = "Question name container";
  targetForm.appendChild(questionNameContainer);

  //question text label
  targetContainerQText = document.getElementById('question-name-container-id');
  questionTextLabel = document.createElement('label');
  questionTextLabel.id = "question-text-id";
  questionTextLabel.className = "question";
  questionTextLabel.innerHTML = "Question";
  targetContainerQText.appendChild(questionTextLabel);

  //question text input box
  questionTextInput = document.createElement('input');
  questionTextInput.type = "text";
  questionTextInput.id = "question-text-input-id";
  questionTextInput.className = "question-form-control";
  questionTextInput.placeholder = "Question";
  questionTextInput.setAttribute('required', '');
  targetContainerQText.appendChild(questionTextInput);

  //answer div
  answerDivs = document.createElement('div');
  answerDivs.id = "answer-div-id";
  answerDivs.className = "form-group";
  // answerDivs.innerHTML = "answer div"; 
  targetForm.appendChild(answerDivs);

  
  // answer 1--------------------------------
  answersTargetContainer = document.getElementById('answer-div-id');
  answerTextLabelOne = document.createElement('label');
  answerTextLabelOne.id = "answer-text-label";
  answerTextLabelOne.className = "question";
  answerTextLabelOne.innerHTML = "Answer1";
  answersTargetContainer.appendChild(answerTextLabelOne);

  answerCheckboxesOne = document.createElement('input');
  answerCheckboxesOne.type = "checkbox";
  answerCheckboxesOne.id = "answer-checkboxes-id";
  answerCheckboxesOne.className = "checkboxes";
  answersTargetContainer.appendChild(answerCheckboxesOne);

  answerTextInputOne = document.createElement('input');
  answerTextInputOne.type = "text";
  answerTextInputOne.id = "answer-text-input-id";
  answerTextInputOne.className = "question-form-control";
  answerTextInputOne.placeholder = "Answer";
  answerTextInputOne.setAttribute('required', '');
  answersTargetContainer.appendChild(answerTextInputOne);


  // answer 2--------------------------------
  vanswersTargetContainer = document.getElementById('answer-div-id');
  answerTextLabelTwo = document.createElement('label');
  answerTextLabelTwo.id = "answer-text-label";
  answerTextLabelTwo.className = "question";
  answerTextLabelTwo.innerHTML = "Answer2";
  answersTargetContainer.appendChild(answerTextLabelTwo);

  answerCheckboxesTwo = document.createElement('input');
  answerCheckboxesTwo.type = "checkbox";
  answerCheckboxesTwo.id = "answer-checkboxes-id";
  answerCheckboxesTwo.className = "checkboxes";
  answersTargetContainer.appendChild(answerCheckboxesTwo);

  answerTextInputTwo = document.createElement('input');
  answerTextInputTwo.type = "text";
  answerTextInputTwo.id = "answer-text-input-id";
  answerTextInputTwo.className = "question-form-control";
  answerTextInputTwo.placeholder = "Answer";
  answerTextInputTwo.setAttribute('required', '');
  answersTargetContainer.appendChild(answerTextInputTwo);

  
  // answer 3--------------------------------
  answersTargetContainer = document.getElementById('answer-div-id');
  answerTextLabelThree = document.createElement('label');
  answerTextLabelThree.id = "answer-text-label";
  answerTextLabelThree.className = "question";
  answerTextLabelThree.innerHTML = "Answer3";
  answersTargetContainer.appendChild(answerTextLabelThree);

  answerCheckboxesThree = document.createElement('input');
  answerCheckboxesThree.type = "checkbox";
  answerCheckboxesThree.id = "answer-checkboxes-id";
  answerCheckboxesThree.className = "checkboxes";
  answersTargetContainer.appendChild(answerCheckboxesThree);

  answerTextInputThree = document.createElement('input');
  answerTextInputThree.type = "text";
  answerTextInputThree.id = "answer-text-input-id";
  answerTextInputThree.className = "question-form-control";
  answerTextInputThree.placeholder = "Answer";
  answerTextInputThree.setAttribute('required', '');
  answersTargetContainer.appendChild(answerTextInputThree);


  // answer 4--------------------------------
  answersTargetContainer = document.getElementById('answer-div-id');
  answerTextLabelFour = document.createElement('label');
  answerTextLabelFour.id = "answer-text-label";
  answerTextLabelFour.className = "question";
  answerTextLabelFour.innerHTML = "Answer4";
  answersTargetContainer.appendChild(answerTextLabelFour);

  answerCheckboxesFour = document.createElement('input');
  answerCheckboxesFour.type = "checkbox";
  answerCheckboxesFour.id = "answer-checkboxes-id";
  answerCheckboxesFour.className = "checkboxes";
  answersTargetContainer.appendChild(answerCheckboxesFour);

  answerTextInputFour = document.createElement('input');
  answerTextInputFour.type = "text";
  answerTextInputFour.id = "answer-text-input-id";
  answerTextInputFour.className = "question-form-control";
  answerTextInputFour.placeholder = "Answer";
  answerTextInputFour.setAttribute('required', '');
  answersTargetContainer.appendChild(answerTextInputFour);
}