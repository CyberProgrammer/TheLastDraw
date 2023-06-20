// This script is used to determine when to display hidden content on the history page

const observer = new IntersectionObserver((entries) => {
	entries.forEach((entry) => {
		console.log(entry)
		if(entry.isIntersecting){
			entry.target.classList.add('show');
		} else{
			entry.target.classList.remove('show')
		}

	});
});

const hiddenElements = document.querySelectorAll('.hidden');
hiddenElements.forEach((el) => observer.observe(el));