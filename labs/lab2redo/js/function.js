            var wins = 0;
            var losses = 0;
            
            var randomNumber = Math.floor(Math.random() * 99) + 1;
            var guesses = document.querySelector('#guesses');
            var lastResult = document.querySelector('#lastResult');
            var lowOrHi = document.querySelector('#lowOrHi');
            var win = document.querySelector('#win');
            var loss = document.querySelector('#loss');
            
            var guessSubmit = document.querySelector('.guessSubmit');
            var guessField = document.querySelector('.guessField');
            
            guessSubmit.addEventListener('click', checkGuess);
            
            var guessCount = 1;
            var resetButton = document.querySelector('#reset');
            resetButton.style.display = 'none';
            
            console.log(randomNumber);
           // document.getElementById("numberToGuess").innerHTML = randomNumber;
            
            function checkGuess(){
                var userGuess = Number(guessField.value);
                if(guessCount === 1){
                    guesses.innerHTML = 'Previous guesses: ';
                }
                
                guesses.innerHTML += userGuess + ' ';
                
                    if(userGuess > 99 || userGuess < 0){
                        alert('Please enter a number between 0 and 99!');
                        return;
                    }
                
                    if(userGuess === randomNumber){
                        wins++;
                        lastResult.innerHTML = 'Congratulations! You got it right!';
                        lastResult.style.backgroundColor = 'green';
                        lowOrHi.innerHTML = '';
                        setGameOver();
                    }
                    
                    else if(guessCount === 7){
                        losses++;
                        lastResult.innerHTML = 'Sorry, you lost!';
                        setGameOver();
                    }
                    else{
                        lastResult.innerHTML = 'Wrong!';
                        lastResult.style.backgroundColor = 'red';
                        if(userGuess < randomNumber){
                            lowOrHi.innerHTML = 'Last guess was too low!';
                        }
                        else if(userGuess > randomNumber){
                            lowOrHi.innerHTML = 'Last guess was too high!';
                        }
                        
                    }
                    
                    guessCount++;
                    guessField.value = '';
                    guessField.focus();
            }
            
        
            
            function setGameOver(){
                guessField.disabled = true;
                guessSubmit.disabled = true;
                resetButton.style.display = 'inline';
                resetButton.addEventListener('click', resetGame);
                win.innerHTML = 'Wins: ' + wins;
                loss.innerHTML = 'Losses: ' + losses;
            }
            
            function resetGame(){
                guessCount = 1;
                var resetParas = document.querySelectorAll('.resultParas p');
                for(var i = 0; i < resetParas.length; i++){
                    resetParas[i].textContent = '';
                }
                
                resetButton.style.display = 'none';
                
                guessField.disabled = false;
                guessSubmit.disabled = false;
                guessField.value = '';
                guessField.focus();
                
                lastResult.style.backgroundColor = 'white';
                randomNumber = Math.floor(Math.random() * 99) + 1;
            }