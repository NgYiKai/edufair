//$input variable is enter_message


// detect if user press ENTER or not
/*
document.addEventListener("DOMContentLoaded", () => {
    document.querySelector("#input").addEventListener("keydown", function(e) {
      if (e.code === "Enter") {
          console.log("***ENTER is clicked***")

          let input = document.getElementById("enter_message").value;
          document.getElementById("user").innerHTML = input;
          output(enter_message);
          console.log("XXXXXXX");
      }
    });
  });
*/

// display user input
document.addEventListener("DOMContentLoaded", () => {
    const inputField = document.getElementById("enter_message")
    inputField.addEventListener("keydown", function(e) {
        if (e.code === "Enter") {
            console.log("***ENTER is clicked***")
            let input = inputField.value;
            inputField.value = "";
            console.log(`User typed: '${input}'`)
            output(input);
        
    }

  });
});


function compare(triggerArray, replyArray, text) {
        let item;
        for (let x = 0; x < triggerArray.length; x++) {
          for (let y = 0; y < replyArray.length; y++) {
            if (triggerArray[x][y] == text) {
              items = replyArray[x];
              item = items[Math.floor(Math.random() * items.length)];
            }
          }
        }
        console.log("Inside compare");
        return item;
}


// standardise user input and return output messsage
function output(input) {
        let message_reply;
        let text = input.toLowerCase().replace(/[^\w\s\d]/gi, "");
        text = text
          .replace(/ a /g, " ")
          .replace(/i feel /g, "")
          .replace(/whats/g, "what is")
          .replace(/please /g, "")
          .replace(/ please/g, "");
      
      //compare arrays
      //then search keyword
      //then random alternative

      console.log("Before compare");
      
        if (compare(trigger, reply, text)) {
          message_reply = compare(trigger, reply, text);
        } else if (text.match(/robot/gi)) {
          message_reply = robot[Math.floor(Math.random() * robot.length)];
        } else {
          message_reply = alternative[Math.floor(Math.random() * alternative.length)];
        }
      
        //update DOM
        addChat(input, message_reply);
        console.log("AFTER addChat")
    
    //print message
    document.getElementById("chatbot").innerHTML = message_reply;
    //speak(message_reply);
    console.log("I AM IN OUTPUT")

    //clear input value
    document.getElementById("input").value = "";
}



function addChat(input, message_reply) {
    const mainDiv = document.getElementById("main");
    //<div> created and id = user
    let userDiv = document.createElement("div");
    userDiv.id = "user";
    userDiv.class = "chat";
    userDiv.innerHTML = `User: <span id = "user_reply" class = "user_reply">${input}</span>`;
    mainDiv.appendChild(userDiv);
  
    let botDiv = document.createElement("div");
    botDiv.id = "bot";
    botDiv.class = "chat";
    botDiv.innerHTML = `Robot: <span id = "bot_reply" class = "bot_reply">${message_reply}</span>`;
    mainDiv.appendChild(botDiv);
    //speak(message_reply);
  }


function speak(string) {
    const u = new SpeechSynthesisUtterance();
    allVoices = speechSynthesis.getVoices();
    u.voice = allVoices.filter(voice => voice.name === "Alex")[0];
    u.text = string;
    u.lang = "en-US";
    u.volume = 1; //0-1 interval
    u.rate = 1;
    u.pitch = 1; //0-2 interval
    speechSynthesis.speak(u);
}


// Bot replies in array
const trigger = [
    //0 
    ["hi", "hey", "hello"],
    //1
    ["how are you", "how are things"],
    //2
    ["what is going on", "what is up"],
    //3
    ["happy", "good", "well", "fantastic", "cool"],
    //4
    ["bad", "bored", "tired", "sad"],
    //5
    ["tell me story", "tell me joke"],
    //6
    ["thanks", "thank you"],
    //7
    ["bye", "good bye", "goodbye"]
    ];
    
    const reply = [
    // 0 - HELLO
    ["Hello!", "Hi!", "Hey!", "Hi there!"], 
    //1 - GREETINGS
    [
        "Fine... how are you?",
        "Pretty well, how are you?",
        "Fantastic, how are you?"
      ],
    //2 - 
    [
        "Nothing much",
        "Exciting things!"
      ],
    //3
    ["Glad to hear it"],
    //4 - negative 
    ["Why?", "Cheer up buddy"],
    //5
    ["What about?", "Once upon a time..."],
    //6
    ["You're welcome", "No problem"],
    //7
    ["Goodbye", "See you later"],
    ];
    
    const alternative = [
      "I don't understand, why not see a counsellor",
      "Why not i assign you to see a counsellor face-to-face",
      "Perhaps a counsellor can give you a better understanding of our univeristy",
      "I'm listening...",
      "Bro..."
    ];