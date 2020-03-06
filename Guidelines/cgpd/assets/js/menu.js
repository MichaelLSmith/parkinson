(() => {

	let open = false;

	const CLASSES = {
		open: 'open',
		wrap: 'main-wrapper',
		menu: 'main-nav'
	};

	const TEXT = {
		open: 'Menu',
		close: 'Close'
	};

	const ELEMENTS = {
		button: document.getElementById('menu-toggle'),
		buttonInner: document.querySelector('#menu-toggle > span'),
		wrap: document.querySelector(`.${CLASSES.wrap}`),
		menu: document.querySelector(`.${CLASSES.menu}`)
	};

	ELEMENTS.button.addEventListener('click', () => {
		open = !open;
		ELEMENTS.button.classList.toggle(`btn--${CLASSES.open}`);
		ELEMENTS.wrap.classList.toggle(`${CLASSES.wrap}--${CLASSES.open}`);
		ELEMENTS.menu.classList.toggle(`${CLASSES.menu}--${CLASSES.open}`);
		ELEMENTS.buttonInner.innerHTML = open ? TEXT.close : TEXT.open;
	});
})();
