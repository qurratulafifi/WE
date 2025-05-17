var typed = new Typed(".typing", {
    strings:["Nur Qurratul Aini binti Afifi"],
    typeSpeed: 50,
    BackSpeed: 40,
    loop: true,
});

const nav = document.querySelector(".nav"),
    navList = nav.querySelectorAll("li"),
    totalNavList = navList.length,
    allSection = document.querySelectorAll(".section"),
    totalSection = allSection.length;
    for(let i = 0; i<totalNavList; i++)
    {
        const a = navList[i].querySelector("a");
        a.addEventListener("click", function()
        {
            for (let i = 0; i<totalSection; i++)
            {
                 allSection[i].classList.remove("back-section");
            }
            
            for(let j = 0; j<totalNavList; j++)
            {
                if(navList[j].querySelector("a").classList.contains("active"))
                {
                    allSection[j].classList.add("back-section");
                }
                navList[j].querySelector("a").classList.remove("active");
            }
        this.classList.add("active")
        showSection(this);
    });

}
function showSection(element)
{
    for (let i = 0; i<totalSection; i++)
    {
        allSection[i].classList.remove("active");
    }
    const target = element.getAttribute("href").split("#")[1];
    document.querySelector("#" + target).classList.add("active")
}

let poll = {
    question: "Which one do you like the most?",
    answers: [
        "Farmhouse", "Bohemian", "Electic", "Hollywood Regency", "Industrial", "Maximalism"
    ],
    pollCount: 60,
    answersWeight: [15,13,7,9,11,5],
    selectedAnswer: -1,
};

let pollDOM = {
    question: document.querySelector(".poll .question"),
    answers: document.querySelector(".poll .answers")
};

pollDOM.question.innerText = poll.question;

pollDOM.answers.innerHTML = poll.answers.map(function(answer, i) {
    return `
        <div class="answer" onclick="markAnswer(${i})">
            ${answer}
            <span class="percentage-bar"></span>
            <span class="percentage-value"></span>
        </div>
    `;
}).join("");

function markAnswer(i) {
    poll.selectedAnswer = +i;

    
    document.querySelectorAll(".poll .answers .answer").forEach(el => {
        el.classList.remove("selected");
    });

    
    document.querySelectorAll(".poll .answers .answer")[i].classList.add("selected");

    showResults();
}

function showResults() {
    let answers = document.querySelectorAll(".poll .answers .answer");
    for (let i = 0; i < answers.length; i++) {
        let percentage = 0;
        if (i == poll.selectedAnswer) {
            percentage = Math.round(
                (poll.answersWeight[i] + 1) * 100 / (poll.pollCount + 1)
            );
        } else {
            percentage = Math.round(
                (poll.answersWeight[i]) * 100 / (poll.pollCount + 1)
            );
        }
        answers[i].querySelector(".percentage-bar").style.width = percentage + "%";
        answers[i].querySelector(".percentage-value").innerText = percentage + "%";
    }
}

const commentBox = document.querySelector(".comment-box textarea");
const postBtn = document.querySelector(".comment-box button");
const commentsList = document.querySelector(".comments-list");

postBtn.addEventListener("click", () => {
  let comment = commentBox.value.trim();
  if (comment !== "") {
    let p = document.createElement("p");
    p.innerText = comment;
    commentsList.prepend(p);
    commentBox.value = "";
  }
});

