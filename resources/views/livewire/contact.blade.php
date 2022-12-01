<div>

    <form class="contact_form" >
        <div class="form_name">
            <input type="text" name="full_name" placeholder="Full Name" wire:model='full_name' class="border-blue-700">
        </div>
        <input type="email" name="email" placeholder="Email" wire:model='email'>

        <textarea name="message" rows="4" placeholder="Message" wire:model='message'></textarea>
        <a class="btn btn-primary" wire:click='send'>Send</a>

    </form>

</div>
