export interface config {
  formId: string
  actionName: string
  inputs: input[];
}

interface input {
  inputType: string
  inputId: string
  required: boolean
}

export class FormHandler {
    inputs: input[]
    form: string;
    payload = {};

    constructor( public config: config ) {
        this.inputs = config.inputs;
        this.form = config.formId;
        this.payload = { action: config.actionName };
    }

    private emailCheck(email): boolean {
      const regEx: RegExp = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/;
      return regEx.test(email); 
    }

    private valueCheck(inputValue: string | number | string[]): boolean {
       return inputValue !== '';
    }
    private validator(item: input) {
      let inputValue = jQuery(`#${item.inputId}`).val()
      if (item.inputType === 'email') {
        return this.emailCheck(inputValue)
      } else if( item.required ) {
        return this.valueCheck(inputValue)
      }
    }

    private formValid(): boolean {
       let self = this;
       return this.inputs.every(this.validator, self);
     }

    private showErrorMessage(): void {
        jQuery.each(this.inputs, (index, item) => {
          let inputValue = jQuery(`#${item.inputId}`).val()
          if ( item.required && !this.valueCheck(inputValue) ||
               item.inputType == 'email' && !this.emailCheck(inputValue) ) {
            jQuery(`#${item.inputId}-error`).removeClass('hidden');
            jQuery(`#${item.inputId}`).addClass('error-message');
          } else {
            jQuery(`#${item.inputId}-error`).addClass('hidden');
            jQuery(`#${item.inputId}`).removeClass('error-message');
          }
        });
    }

    private showSucessAndReset(): void {
        // clear error messages
        this.showErrorMessage();
        // show success message 
        jQuery(`#${this.form}-success`).removeClass('hidden');
        // reset form
        let form = <HTMLFormElement>jQuery(`#${this.form}`)[0]
        form.reset();
        jQuery('#spinner').addClass('hidden');

    }

    // create data object to be passed to server
    private makePayload(): void {
        this.inputs.forEach( item => {
            this.payload[item.inputId] = jQuery(`#${item.inputId}`).val(); 
        })
    }

    submitForm(): void {
      this.makePayload();

      if ( this.formValid() ) {
        let data = this.payload;
        console.log(data);

        jQuery('#spinner').removeClass('hidden');

        jQuery.post('/wp-admin/admin-ajax.php', data, (response) => {
          if(response.message) {
            this.showSucessAndReset();
          } else if(response.success === false) {
            jQuery(`${this.form}-error`)
              .text(response.data.error)
              .removeClass('hidden');
          }

        });

      } else {
        this.showErrorMessage();
      }
                
    }
}
