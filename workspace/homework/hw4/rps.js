var imgPlayer;
var btnRock;
var btnPaper;
var btnScissors;
var btnGo;
var computerChoice;
var playerChoice;

function init(){
	imgPlayer = document.getElementById("imgPlayer");
	btnRock = document.getElementById("btnRock");
	btnPaper = document.getElementById("btnPaper");
	btnScissors = document.getElementById("btnScissors");
	btnGo = document.getElementById("btnGo");
	deselectAll();
}
function deselectAll(){
	btnPaper.style.backgroundColor = 'silver';
	btnScissors.style.backgroundColor = 'silver';
	btnRock.style.backgroundColor = 'silver';
}	
function select(choice){
	playerChoice = choice;
	imgPlayer.src = 'images/' + choice + '.png';
	deselectAll();
	if(choice=='rock') btnRock.style.backgroundColor = '#888888';
	if(choice=='paper') btnPaper.style.backgroundColor = '#888888';
	if(choice=='scissors') btnScissors.style.backgroundColor = '#888888';
	
	btnGo.style.display = 'block';
}
function go(){
	var txtEndTitle = document.getElementById('txtEndTitle');
	var txtEndMessage = document.getElementById('txtEndMessage');
	
	var numChoice = Math.floor(Math.random()*3); // 0, 1 or 2
	var imgComputer = document.getElementById('imgComputer');
	
	document.getElementById('lblRock').style.backgroundColor = '#EEEEEE';
	document.getElementById('lblPaper').style.backgroundColor = '#EEEEEE';
	document.getElementById('lblScissors').style.backgroundColor = '#EEEEEE';
	
	if(numChoice == 0){
		computerChoice = 'rock';
		imgComputer.src = 'images/rock.png';
		document.getElementById('lblRock').style.backgroundColor = 'yellow';
		if(playerChoice=='rock'){
			txtEndTitle.innerHTML = '';
			txtEndMessage.innerHTML = 'TIE';			
		}
		else if(playerChoice=='paper'){
			txtEndTitle.innerHTML = 'Paper covers rock';
			txtEndMessage.innerHTML = 'You win!';			
		}
		else if(playerChoice=='scissors'){
			txtEndTitle.innerHTML = 'Rock smashes scissors';
			txtEndMessage.innerHTML = 'You lose!';			
		}
	}
	if(numChoice == 1){
		computerChoice = 'paper';
		imgComputer.src = 'images/paper.png';
		document.getElementById('lblPaper').style.backgroundColor = 'yellow';
		if(playerChoice=='rock'){
			txtEndTitle.innerHTML = 'Paper covers rock';
			txtEndMessage.innerHTML = 'You lose!';			
		} 
		else if(playerChoice=='paper'){
			txtEndTitle.innerHTML = '';
			txtEndMessage.innerHTML = 'Tie';			
		} 
		else if(playerChoice=='scissors'){
			txtEndTitle.innerHTML = 'Scissors cuts paper';
			txtEndMessage.innerHTML = 'You win!';			
		} 
	} 
	if(numChoice == 2){
		computerChoice = 'scissors';
		imgComputer.src = 'images/scissors.png';
		document.getElementById('lblScissors').style.backgroundColor = 'yellow';
		if(playerChoice=='rock'){
			txtEndTitle.innerHTML = 'Rock smashes scissors';
			txtEndMessage.innerHTML = 'You win!';	
		}
		else if(playerChoice=='paper'){
			txtEndTitle.innerHTML = 'Scissors cuts paper';
			txtEndMessage.innerHTML = 'You lose!';
		}
		else if(playerChoice=='scissors'){
			txtEndTitle.innerHTML = '';
			txtEndMessage.innerHTML = 'Tie!';
		} 		
	}
	document.getElementById('endScreen').style.display = 'block';
}
function startGame(){
	document.getElementById('introScreen').style.display = 'none';
}
function replay(){
	document.getElementById('endScreen').style.display = 'none';
}

