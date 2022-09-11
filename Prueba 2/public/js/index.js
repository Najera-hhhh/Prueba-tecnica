document.getElementById('form-words').addEventListener('submit', (event) => {

    event.preventDefault()

    let words = document.getElementById('words').value.trim().split(' ');
    let wordsProccesed = {
        totalWords: words.length,
        sizeFirstWord: words[0],
        lastWord: words[words.length - 1],
        invetWords: [...words].reverse(),
        sortWords: [...words].sort(),
        sortWordDesc: [...words].sort((a, b) => a < b),
    }


    window.open(`/formato?&${new URLSearchParams(wordsProccesed)}`, '_blank', "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=400, height=400");
})