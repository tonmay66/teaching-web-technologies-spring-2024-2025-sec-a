const display = document.getElementById('display');
const buttonContainer = document.getElementById('buttons');
const buttons = [
  '7','8','9','/',
  '4','5','6','*',
  '1','2','3','-',
  '0','.','=','+',
  '%','C'
];
buttons.forEach(label => {
  const btn = document.createElement('button');
  btn.textContent = label;
 if (label === '=') {
    btn.addEventListener('click', () => {
      try {
        const expression = display.value.replace(/%/g, '/100');
        display.value = eval(expression);
      } catch {
        display.value = 'Error';
      }
    });
  } else if (label === 'C') {
    btn.addEventListener('click', () => {
      display.value = '';
    });
  } else if (label === '%') {
    btn.addEventListener('click', () => {
      display.value += '%';
    });
  } else if (label === '+') {
    btn.addEventListener('click', () => {
      display.value += '+';
    });
  } else if (label === '-') {
    btn.addEventListener('click', () => {
      display.value += '-';
    });
  } else if (label === '*') {
    btn.addEventListener('click', () => {
      display.value += '*';
    });
  } else if (label === '/') {
    btn.addEventListener('click', () => {
      display.value += '/';
    });
  } else if (label === '.') {
    btn.addEventListener('click', () => {
      display.value += '.';
    });
  } else {
    btn.addEventListener('click', () => {
      display.value += label;
    });
  }

  buttonContainer.appendChild(btn);
});