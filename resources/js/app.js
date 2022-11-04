// Our main CSS
import '../css/app.css'

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

//Tools ssed to create axios request
import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

//Tools used to create blob animation
import { spline } from 'https://cdn.skypack.dev/@georgedoescode/spline@1.0.1';
import SimplexNoise from 'https://cdn.skypack.dev/simplex-noise@2.4.0';
const path = document.querySelectorAll('path');
const points = createPoints();
const simplex = new SimplexNoise();
let noiseStep = 0.001; //Determines movementspeed of shape

function createPoints() {
  const points = [];
  const numPoints = 5; //Determines amount of points on shape
  const angleStep = (Math.PI * 2) / numPoints;
  const rad = 75; //Determines radius of circle

  for (let i = 1; i <= numPoints; i++) {
    const theta = i * angleStep;
    const x = 100 + Math.cos(theta) * rad;
    const y = 100 + Math.sin(theta) * rad;

    points.push({
      x: x,
      y: y,
      originX: x,
      originY: y,
      noiseOffsetX: Math.random() * 1000,
      noiseOffsetY: Math.random() * 1000,
    });
  }
  return points;
}

function noise(x, y) {return simplex.noise2D(x, y);}

(function animate() {
  //applies path calculation (d) to every path with class "blob"
  for (let i of path) {
    i.setAttribute('d', spline(points, 2, true));
  }

  for (let i = 0; i < points.length; i++) {
      const point = points[i];

      const nX = noise(point.noiseOffsetX, point.noiseOffsetX);
      const nY = noise(point.noiseOffsetY, point.noiseOffsetY);

      const x = map(nX, -1, 1, point.originX - 20, point.originX + 20);
      const y = map(nY, -1, 1, point.originY - 20, point.originY + 20);

      point.x = x;
      point.y = y;
  
      point.noiseOffsetX += noiseStep;
      point.noiseOffsetY += noiseStep;
    }
  requestAnimationFrame(animate);
})();

function map(n, start1, end1, start2, end2) {
  return ((n - start1) / (end1 - start1)) * (end2 - start2) + start2;
}

let background = document.getElementById("background")
let start = document.getElementById("start")
let question = document.getElementById("question")
let answer = document.getElementById("answer")
let result = document.getElementById("result")
let filmList = document.getElementById("filmList").children
let geografiList = document.getElementById("geografiList").children
let historiaList = document.getElementById("historiaList").children
let musikList = document.getElementById("musikList").children
let övrigtList = document.getElementById("övrigtList").children
let vetenskapList = document.getElementById("vetenskapList").children
let sportList = document.getElementById("sportList").children
let categoryArray = [filmList, geografiList, historiaList, musikList, övrigtList, vetenskapList, sportList] //Array with the ul children of every category
let questionCount
let correctCount
let questions
let categoryPoint = {}
let currentCategory

document.getElementById("init").onclick = function() {init()};
function init() {
  //Loads questions from questions.json file
  axios.get("/questions").then(response => { //GET request to routes /questions
      questions = response.data //recived data from response is saved in questions variable

      //Resets count for every new start
      questionCount = 1
      correctCount = 0

      //Resets bars on result page
      categoryPoint["Film & TV"] = 5
      categoryPoint["Geografi"] = 5
      categoryPoint["Historia"] = 5
      categoryPoint["Musik"] = 5
      categoryPoint["Övrigt"] = 5
      categoryPoint["Vetenskap"] = 5
      categoryPoint["Sport"] = 5

      for (let a = 0; a < categoryArray.length; a++) {
        let childArray = categoryArray[a]
        for (let i = 0; i < childArray.length; i++) {
          childArray[i].classList = "li"
        }
      }

      toQuestion()
  } ) 
}

//Shows question page
function toQuestion () {
  document.getElementById("start").classList = "hidden"
  document.getElementById("question").classList = "flex flex-col justify-center h-full"
  document.getElementById("questionCount").innerHTML = "fråga " + questionCount + " av 35";
  let progress = Math.round(questionCount*(100/35))
  document.getElementById("questionBar").style.width = progress + "%"
  document.getElementById("questionText").innerHTML = questions[questionCount - 1]["question"];
  document.getElementById("categoryText").innerHTML = questions[questionCount - 1]["category"];
  console.log(questions[questionCount - 1]["category"]);
  path[0].classList = "blob text-purple"
  path[1].classList = "blob text-purple" 
  document.getElementById('logo').setAttribute('src', '/img/logo.svg')
  document.getElementById('titleLogo').setAttribute('href', '/img/logo.svg')
  currentCategory = questions[questionCount - 1]["category"];
}

//Shows answer page. Adds one to question count.
document.getElementById("toAnswer").onclick = function() {toAnswer()};
function toAnswer () {
  question.classList = "hidden"
  answer.classList = "mx-auto flex flex-col justify-center h-full"
  background.classList.add("bg-purple")
  document.getElementById("answerCount").innerHTML = "fråga " + questionCount + " av 35";
  document.getElementById("answerText").innerHTML = questions[questionCount -1]["answer"];
  let progress = Math.round(questionCount*(100/35))
  document.getElementById("answerBar").style.width = progress + "%"
  path[0].classList = "blob text-white"
  path[1].classList = "blob text-white" 
  document.getElementById('logo').setAttribute('src', '/img/logo-inverted.svg')
  document.getElementById('titleLogo').setAttribute('href', '/img/logo-inverted.svg')
  questionCount++
}

//Yes button. Adds to correct count. Updates bars on result page. Shows next question page OR result page if there are no more questions.
document.getElementById("yes").onclick = function() {yes()};
function yes () {
  categoryPoint[currentCategory]--
  correctCount++
  updateTable();
    if (questionCount <= 35) {
        background.classList.remove("bg-purple")
        toQuestion()
    } else{
        toResult()
    }
}

//No button. Shows next question page OR result page if there are no more questions.
document.getElementById("no").onclick = function() {no()};
function no () {
    if (questionCount <= 35) {
        background.classList.remove("bg-purple")
        toQuestion()
    } else{
        toResult()
    }
}

//Shows result page
function toResult () {
  answer.classList = "hidden"
  result.classList = "mx-auto flex flex-col justify-center h-full"
  background.classList.remove("bg-purple")
  document.getElementById("totalCount").innerHTML = "Du fick " + correctCount + " rätt av 35";
  document.getElementById('blob-l').setAttribute('fill', '#7678ED')
  document.getElementById('blob-r').setAttribute('fill', '#7678ED')
  document.getElementById('logo').setAttribute('src', '/img/logo.svg')
}

//Shows start page
document.getElementById("toStart").onclick = function() {toStart()};
function toStart () {
    result.classList = "hidden"
    start.classList = "flex flex-col justify-center h-full"
}

//Updates bars on result page depending on category.
function updateTable() {
const liEdit = "li bg-green"
  switch (currentCategory) {
    case "Film & TV":
      filmList[categoryPoint[currentCategory]].classList = liEdit
      break;
    case "Geografi":
      geografiList[categoryPoint[currentCategory]].classList = liEdit
      break;
    case "Historia":
      historiaList[categoryPoint[currentCategory]].classList = liEdit
      break;
    case "Musik":
      musikList[categoryPoint[currentCategory]].classList = liEdit
      break;
    case "Övrigt":
      övrigtList[categoryPoint[currentCategory]].classList = liEdit
      break;
    case "Vetenskap":
       vetenskapList[categoryPoint[currentCategory]].classList = liEdit
       break;
     case "Sport":
       sportList[categoryPoint[currentCategory]].classList = liEdit
       break;
    default:
      console.log("default was triggered from updateTable()");
      break;
  }
}