import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

document.addEventListener("DOMContentLoaded", function() {
  // Initial page load animation
  gsap.from("body", {
    opacity: 0,
    duration: 1,
    ease: "power3.out"
  });

  // Header animation
  gsap.from(".main-header", {
    y: -100,
    opacity: 0,
    duration: 0.8,
    ease: "power2.out",
    delay: 0.2
  });

  // Footer animation
  gsap.from(".main-footer", {
    y: 100,
    opacity: 0,
    duration: 0.8,
    ease: "power2.out",
    delay: 0.4
  });

  // Staggered animation for main content sections
  gsap.from(".main-content-section", {
    opacity: 0,
    y: 50,
    duration: 0.8,
    ease: "power2.out",
    stagger: 0.1,
    scrollTrigger: {
      trigger: ".main-content-section",
      start: "top 80%", // When 80% of the section is in view
      toggleActions: "play none none none"
    }
  });

  // Parallax effect for the PPDB section (assuming it has a specific ID or class)
  gsap.to("#ppdb", {
    backgroundPositionY: "20%",
    ease: "none",
    scrollTrigger: {
      trigger: "#ppdb",
      start: "top bottom", // when top of trigger hits bottom of viewport
      end: "bottom top", // when bottom of trigger hits top of viewport
      scrub: true
    }
  });

  // Generic animate-on-scroll elements (if any still exist)
  gsap.utils.toArray(".animate-on-scroll").forEach(element => {
    gsap.from(element, {
      opacity: 0,
      y: 50,
      duration: 0.8,
      ease: "power2.out",
      scrollTrigger: {
        trigger: element,
        start: "top 85%",
        toggleActions: "play none none none"
      }
    });
  });
});