gsap.registerPlugin(ScrollTrigger);

// GAME PAGE ANIMATION

ScrollTrigger.matchMedia({

    // medium >= 768px
    "(min-width: 768px)": function() {
        let tlGame = gsap.timeline({
            scrollTrigger: {
                trigger: '#midBox',
            }
        });
        
        tlGame.from('#topBox', {y: -100, scale:0.5, opacity: 0, duration: 1})
              .from('#leftBox', {x: -100, scale:0.5, opacity: 0, duration: 1}, '-=1')
              .from('#rightBox', {x: 100, scale:0.5, opacity: 0, duration: 1}, '-=1')
              .from('#midBox', {scale:0.5, opacity: 0, duration: 1}, '-=1')
    },

    "(max-width: 767px)": function() {
        let tlGame = gsap.timeline({
            scrollTrigger: {
                trigger: '#midBox',
            }
        });
        
        tlGame.from('#midBox', {scale:0.5, opacity: 0, duration: 1}, '-=1')
    }
})

// ABOUT US

let tlAbout = gsap.timeline({
    scrollTrigger: {
        trigger: '#about',
        start: '10% bottom',
        toggleActions: 'restart',
    }
})

tlAbout.from('#aboutBalloon', {scale:0.5, opacity: 0, duration: 1}, 0.25)
       .from('#aboutContent', {scale:0.5, opacity: 0, duration: 1}, '-=0.75')


// MOVER

let tlChat = gsap.timeline({
    scrollTrigger: {
        trigger: '.mover',
        start: '10% bottom',
        toggleActions: 'restart',
    }
})

tlChat.from('#chat1', {scale:0.5, opacity: 0, duration: 1}, 0.5)

let tlMover = gsap.timeline({
    scrollTrigger: {
        trigger: '.mover',
        start: 'top top',
        scrub: true,
        pin:  true,
    }
})

tlMover.from('#pane1', {xPercent:-100})
       .to('#pane1', {xPercent:100})
       

let tlMover2 = gsap.timeline({
    scrollTrigger: {
        trigger: '#moverBG',
        start: 'center center',
        scrub: true,
    }
})

tlMover2.from('#chatRight', {xPercent: 100, scale:0.5, opacity: 0, duration: 1}, 3.5)
        .from('#chatLeft', {xPercent: -100, scale:0.5, opacity: 0, duration: 1})


// HOW

ScrollTrigger.matchMedia({

    // medium >= 768px
    "(min-width: 768px)": function() {
        let tlHow = gsap.timeline({
            scrollTrigger: {
                trigger: '#how',
                toggleActions: 'restart',
            }
        })
        
        tlHow.from('#howBalloon', {scale:0.5, opacity: 0, duration: 1}, 0.5)
             .from('#how1', {x:-100, scale:0.5, opacity: 0, duration: 1}, 1)
             .from('#how2', {x:100, scale:0.5, opacity: 0, duration: 1}, 1)
             .from('#how3', {x:-100, scale:0.5, opacity: 0, duration: 1}, 1.5)
             .from('#how4', {x:100, scale:0.5, opacity: 0, duration: 1}, 1.5)
    },

    "(max-width: 767px)": function() {
        let tlHow = gsap.timeline({
            scrollTrigger: {
                trigger: '#how',
                toggleActions: 'restart',
            }
        })
        
        tlHow.from('#howBalloon', {scale:0.5, opacity: 0, duration: 1}, 0.5)
             .from('#how1', {y:-100, scale:0.5, opacity: 0, duration: 1}, 1)
             .from('#how2', {y:-100, scale:0.5, opacity: 0, duration: 1}, 1.5)
             .from('#how3', {y:-100, scale:0.5, opacity: 0, duration: 1}, 2)
             .from('#how4', {y:-100, scale:0.5, opacity: 0, duration: 1}, 2.5)
    }
})

// TRAIN

let ltTrain = gsap.timeline({
    scrollTrigger: {
        trigger: '#trainBG',
        scrub: true,
    }
})

ltTrain.from('#train', {xPercent:100})
       .to('#train', {xPercent:-100})

// FEATURES

let tlFeatures = gsap.timeline({
    scrollTrigger: {
        trigger: '#features',
        toggleActions: 'restart',
    }
})

tlFeatures.from('#featuresBalloon', {scale:0.5, opacity: 0, duration: 1}, 0.25)

// CONTACT

let tlContact = gsap.timeline({
    scrollTrigger: {
        trigger: '#contact',
        toggleActions: 'restart',
    }
})

tlContact.from('#contactBalloon', {scale:0.5, opacity: 0, duration: 1}, 0.25)
         .from('#contactSub', {scale:0.5, opacity: 0, duration: 1}, '-=0.75')
         .from('#contact1', {scale:0.5, opacity: 0, duration: 1}, '-=0.75')
         .from('#contact2', {scale:0.5, opacity: 0, duration: 1}, '-=0.75')
         .from('#contact3', {scale:0.5, opacity: 0, duration: 1}, '-=0.75')
         .from('#contact4', {scale:0.5, opacity: 0, duration: 1}, '-=0.75')

