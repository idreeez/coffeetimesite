function onEntry(entry) {
    entry.forEach(change => {
      if (change.isIntersecting) {
        change.target.classList.add('animate__fadeInUp');
      }
    });
  }
  let options = { threshold: [0.5] };
  let observer = new IntersectionObserver(onEntry, options);
  let element = document.querySelectorAll('.animate__animated');
  for (let elm of element) {
    observer.observe(elm);
  }