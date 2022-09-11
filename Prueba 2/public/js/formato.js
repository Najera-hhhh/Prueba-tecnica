document.addEventListener('DOMContentLoaded', () => {

    const wordsProcessed = new URLSearchParams(window.location.href);
    console.log(wordsProcessed);

    document.getElementById('total_words').innerText = wordsProcessed.get('totalWords');
    document.getElementById('sizefirstword').innerText = wordsProcessed.get('sizeFirstWord');
    document.getElementById('last_word').innerText = wordsProcessed.get('lastWord');
    document.getElementById('invert_words').innerText = wordsProcessed.get('invetWords');
    document.getElementById('sort_words').innerText = wordsProcessed.get('sortWords');
    document.getElementById('sort_words_des').innerText = wordsProcessed.get('sortWordDesc');




});
