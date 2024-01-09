// collect DOMs
const display = document.querySelector('.display');
const controllerWrapper = document.querySelector('.controllers');

const State = ['Initial', 'Record', 'Download'];
let stateIndex = 0;
let mediaRecorder, chunks = [],
    audioURL = '';

// mediaRecorder setup for audio
if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    console.log('mediaDevices supported..');

    navigator.mediaDevices.getUserMedia({
        audio: true
    }).then(stream => {
        mediaRecorder = new MediaRecorder(stream);

        mediaRecorder.ondataavailable = (e) => {
            chunks.push(e.data);
        }

        mediaRecorder.onstop = () => {
            const blob = new Blob(chunks, {
                'type': 'audio/ogg; codecs=opus'
            });
            chunks = [];
            audioURL = window.URL.createObjectURL(blob);
            document.querySelector('audio').src = audioURL;
        }
    }).catch(error => {
        console.log('Following error has occurred: ', error)
    });
} else {
    stateIndex = '';
    application(stateIndex);
}

const clearDisplay = () => {
    display.textContent = '';
}

const clearControls = () => {
    controllerWrapper.textContent = '';
}

const record = () => {
    stateIndex = 1;
    mediaRecorder.start();
    application(stateIndex);
}

const downloadAudio = () => {
    const downloadLink = document.createElement('a');
    downloadLink.href = audioURL;
    downloadLink.setAttribute('download', 'audio');
    downloadLink.click();
}

const addButton = (id, funString, text) => {
    const btn = document.createElement('button');
    btn.id = id;
    btn.setAttribute('onclick', funString);
    btn.textContent = text;
    btn.style = 'border-radius: 5px; padding: 10px 20px; background-color: #ed4337; color: white; border: none; cursor: pointer;';
    controllerWrapper.append(btn);
}

const addMessage = (text) => {
    const msg = document.createElement('p');
    msg.textContent = text;
    display.append(msg);
}

const addAudio = () => {
    const audio = document.createElement('audio');
    audio.controls = true;
    audio.src = audioURL;
    display.append(audio);
}

const application = (index) => {
    switch (State[index]) {
        case 'Initial':
            clearDisplay();
            clearControls();

            addButton('record', 'record()', 'Laisser Un vocal');
            break;

        case 'Record':
            clearDisplay();
            clearControls();

            addMessage('Recording...');
            addButton('stop', 'stopRecording()', 'Stoppez le vocal');
            break

        case 'Download':
            clearControls();
            clearDisplay();

            addAudio();
            addButton('record', 'record()', 'Laisser Un vocal');
            break

        default:
            clearControls();
            clearDisplay();

            addMessage('Your browser does not support mediaDevices');
            break;
    }
}

function send() {
    document.getElementById("send").value = document.getElementsByTagName("audio")[0].src;
}
const sendAudioToController = async (audioBlob) => {
    const formData = new FormData();
    formData.append('audio', audioBlob);
    formData.append('_token', '{{ csrf_token() }}');
    formData.append('form_type', 'audio');
    formData.append('structure', '{{ $structure->id }}');
    formData.append('user', '{{ $user->id }}');

    try {
        // const response = await fetch("https://avis-client.online/public/voice", {
        const response = await fetch("/voice/", {
            method: 'POST',
            body: formData,
        });

        if (response.ok) {
            console.log('Audio téléversé avec succès.');
        } else {
            console.error('Erreur lors du téléversement de l\'audio.');
        }
    } catch (error) {
        console.error('Erreur réseau :', error);
    }
};

const stopRecording = () => {
    stateIndex = 2;
    mediaRecorder.stop();

    // Après avoir arrêté l'enregistrement, envoyez l'audio au contrôleur
    mediaRecorder.onstop = () => {
        const blob = new Blob(chunks, {
            'type': 'audio/ogg; codecs=opus'
        });
        chunks = [];
        audioURL = window.URL.createObjectURL(blob);

        sendAudioToController(blob); // Envoyer le blob audio au contrôleur
        alert("Audio envoyé avec succes");
        application(stateIndex);
    };
}
application(stateIndex);

function displayId(param) {
    switch (param) {
        case 'yes':
            change1();
            break;
        case 'no':
            change2();
            break;
    }
}

function change1() {
    document.getElementById("idForm").style.display = "block";
}

function change2() {
    document.getElementById("idForm").style.display = "none";
}
