"use strict";
// ******* EVENT HANDLING ***********

var evt = {
    attach: function(node, eventName, func) {
        node.addEventListener(eventName, func);
    },
    detach: function(node, eventName, func) {
        node.removeEventListener(eventName, func);
    },
    preventDefault: function(e) {
        e.preventDefault();
    }
}


// ******* SLIDESHOW CODE ************
var slideshow  = {
    timer: null,
    nodes: { image: null, caption: null},
    img: { cache: [], counter: 0},
    play: true,
    speed: 2000,

    loadImages: function(slides) {
        var image;
        for (var i in slides) {
            image = new Image();
            image.src = slides[i].href;
            image.title = slides[i].title;
            this.img.cache.push(image);
        }
        return this;
    },
    startSlideshow: function() {
        if(arguments.length === 2) {
            this.nodes.image = arguments[0];
            this.nodes.caption = arguments[1];
        }
        this.timer = setInterval(this.displayNextImage.bind(this), this.speed);
        return this;
    },
    displayNextImage: function() {
        this.img.counter = ++this.img.counter % this.img.cache.length;
        var displayImage = this.img.cache[this.img.counter];
        this.nodes.image.src = displayImage.src;
        this.nodes.caption.firstChild.nodeValue = displayImage.title;
    },
    stopSlideshow: function() {
        clearInterval(this.timer);
        return this;
    },
    togglePlay: function(e) {
        if(slideshow.play) {
            slideshow.stopSlideshow();
        } else {
            slideshow.startSlideshow();
        }
        slideshow.play = ! slideshow.play;
        evt.preventDefault(e);
    }

}

