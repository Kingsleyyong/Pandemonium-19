var image_background = new function() {
  // Define images
  this.background = new Image();
  //images src
  this.background.src = "street.jpg";
}

function Draw() {
  this.init = function(x, y) {
    this.x = x;
    this.y = y;
  }
  this.speed = 0;
  this.canvasWidth = 0;
  this.canvasHeight = 0;
  // abstract function to be implemented in child objects
  this.draw = function() {
  };
}

/**
 * Creates the background object which will become a child of
 * the Draw object. The background is drawn on the "background"
 * canvas and creates the illusion of moving by panning the image.
 */
function background() {
  this.speed = 20; // Redefine speed of the background for panning
  // Implement abstract function
  this.draw = function() {
    // Pan background
    this.x += this.speed;
    this.context.drawImage(image_background.background, this.x, this.y);
    // Draw another image at the top edge of the first image
    this.context.drawImage(image_background.background, this.x- this.canvasWidth, this.y );
    // If the image scrolled off the screen, reset
    if (this.x >= this.canvasWidth)
      this.x = 0;
  };
}
// background to inherit properties from Draw
background.prototype = new Draw();

/**
 * Creates the Game object which will hold all objects and data for
 * the game.
 */
function play() {
  /*
   * Gets canvas information and context and sets up all game
   * objects.
   * Returns true if the canvas is supported and false if it
   * is not. This is to stop the animation script from constantly
   * running on older browsers.
   */
  this.init = function() {
    // Get the canvas element
    this.bgCanvas = document.getElementById('background');
    // Test if canvas is supported
    if (this.bgCanvas.getContext) {
      this.bgContext = this.bgCanvas.getContext('2d');
      //show objects to contain their context and canvas information
      background.prototype.context = this.bgContext;
      background.prototype.canvasWidth = this.bgCanvas.width;
      background.prototype.canvasHeight = this.bgCanvas.height;
      // show the background object
      this.background = new background();
      this.background.init(0,0); // Set draw point to 0,0
      return true;
    } else {
      return false;
    }
  };
  //animation loop start moving
  this.start = function() {
    animate();
  };
}

/**
 * The animation loop. Calls the requestAnimationFrame shim to
 * optimize the game loop and draws all game objects. This
 * function must be a gobal function and cannot be within an
 * object.
 */
function animate() {
  requestAnimFrame( animate );
  game.background.draw();
}
/**
 * Finds the first API that works to optimize the animation loop,
 * otherwise defaults to setTimeout().
 */
window.requestAnimFrame = (function(){
  return  window.requestAnimationFrame   ||
    window.webkitRequestAnimationFrame   ||
    window.mozRequestAnimationFrame      ||
    window.oRequestAnimationFrame        ||
    window.msRequestAnimationFrame       ||
    function(/* function */ callback, /* DOMElement */ element){
      window.setTimeout(callback, 1000 / 60);
    };
})();

/**
 * Initialize the Game and starts it.
 */
var game = new play();
function init() {
  if(game.init())
    game.start();
}

//background loop
//////
//jump function

const protagonist = document.getElementById("protagonist"); // protagonist
const enemy = document.getElementById("enemy"); // enemy
function jump() {
  if (protagonist.classList != "jump") {
    protagonist.classList.add("jump")
    setTimeout(function () {
      protagonist.classList.remove("jump");
    }, 300)
  }
}

document.addEventListener("keydown", function (event){
  jump();
})

/////
//test if player alive

let isAlive = setInterval(function () {
  //get protagonist y position
  let protagonistTop = parseInt(window.getComputedStyle(protagonist).getPropertyValue("top"));
  //get enemy x position
  let enemy_left = parseInt(window.getComputedStyle(enemy).getPropertyValue("left"));

  // detect if crash each other

  if (enemy_left < 100 && enemy_left > 0 && protagonistTop > 140){
    alert("Game Over!");
  }
}, 10);

////





