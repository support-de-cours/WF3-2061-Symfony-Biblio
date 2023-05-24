import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    connect()
    {
        // alert( this.element.getAttribute('maxlength') );
        let item = this.element;

        // generate an ID for the counter
        let ID = this.makeID();

        // Set the ID to the input
        item.setAttribute('data-charcounter', ID);

        // Create the counter view
        let view = document.createElement('DIV');
            view.setAttribute('class', "charcounter");
            view.setAttribute('data-charcounter-id', ID);
        
        // Insert the view
        item.parentNode.insertBefore(view, item.nextSibling);

        // Listen the keyup on input
        item.addEventListener('keyup', event => {
            this.countChars(event.currentTarget);
        });

        // Refresh the counter
        this.countChars(item);
    }

    countChars(item)
    {
        let str = item.value;
        let length = str.length;
        let id = item.getAttribute('data-charcounter');
        let maxlength = item.getAttribute('maxlength');
        let view = document.querySelector(`[data-charcounter-id=${id}]`);

        let percent = (length * 100) / maxlength;

        percent >= 95 
            ? view.classList.add("text-warning") 
            : view.classList.remove("text-warning");

        percent == 100 
            ? view.classList.add("text-danger") 
            : view.classList.remove("text-danger");
        
        view.innerHTML = `${length} / ${maxlength}`;
    }

    makeID() {
        return Math.random().toString(36).substr(2, 9);
    }
}