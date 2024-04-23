import Quill from "quill";
window.Quill = Quill;

const options = {
    debug: "info",
    modules: {
        toolbar: true,
    },
    placeholder: "Compose an epic...",
    theme: "snow",
};
editor = new Quill("#editor", options);
