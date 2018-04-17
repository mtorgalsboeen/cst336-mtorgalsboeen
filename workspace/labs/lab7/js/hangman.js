var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
var selectedWord = "";
var selectedHint = "";
var board = [];
var remainingGuesses = 6;
var words = [{ word: "snake", hint: "It's a reptile" }, 
             { word: "monkey", hint: "It's a mammal" }, 
             { word: "beetle", hint: "It's an insect" }];

//Listeners
window.onload = startGame();

//Functions
function startGame(){
    pickWord();
    createLetters();
    initBoard();
    updateBoard();
}
function initBoard(){
    for (var letter in selectedWord){
        board.push("_");
    }
}
function pickWord(){
    var randomInt = Math.floor(Math.random() * words.length);
    selectedWord = words[randomInt].toUpperCase();
    selectedHint = words[randomInt].hint;
}
function updateBoard(){
    $("#word").empty();
    
    for (var i=0; i < board.length; i++){
        $("#word").append(board[i] + " ");
    }
    $("#word").append("<br />");
    $("#word").append("<span class='hint'>Hint: " + selectedHint + "</span>");
}

var randomInt = Math.floor(Math.random() * words.length);
selectedWord = words[randomInt];

// Fill the board with underscores
$("#letterBtn").click(function(){
    var boxVal = $("#letterBox").val();
    console.log("You pressed the button and it had the value: " + boxVal);
})
function createLetters(){
    for (var letter of alphabet){
        let letterInput = '"' + letter + '"';
        $("#letters").append("<button class='letter' id='" + letter + "'>" + letter + "</button>");
    }
}
$(".letter").click(function(){
    console.log($(this).attr("id"));
})
function checkLetter(letter){
    var positions = new Array();
    
    for (var i=0; i < selectedWord.length; i++){
        console.log(selectedWord);
        if(letter == selectedWord){
            positions.push(i);
        }
    }
    if(positions.length > 0){
        updateWord(positions, letter);
        
        // Check to see if this is a winning guess
        if (!board.includes('_')){
            endGame(true);
        }
    } else {
        remainingGuesses -= 1;
        updateMan();
    }
    if (remainingGuesses <= 0){
        endGame(false);
    }
}
function updateWord(positions, letter){
    for (var pos of positions){
        board[pos] = letter;
    }
    updateBoard();
}
//Calculates and updates the image for our stick man
function updateMan(){
    $("#hangImg").attr("src", "img/stick_" + (6 - remainingGuesses) + ".png");
}
//Ends game by hiding game divs and displaying the win or loss divs
function endGame(win){
    $("#letters").hide();
    
    if(win){
        $('#won').show();
    } else {
        $('$lost').show();
    }
}
function disableButton(btn){
    btn.prop("disabled",true);
    btn.attr("class", "btn btn-danger");
}
$(".letter").click(function(){
    checkLetter($(this).attr("id"));
    disableButton($(this));
})
