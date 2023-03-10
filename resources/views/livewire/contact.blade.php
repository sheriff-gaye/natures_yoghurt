<div>
    <form class="contact_form">

        <input type="text" name="full_name" placeholder="Full Name" wire:model='full_name'>
        @error('full_name')
            <span style="color:white">{{ $message }}</span>
        @enderror

        <input type="email" name="email" placeholder="Email" wire:model='email'>
        @error('email')
            <span style="color:white">{{ $message }}</span>
        @enderror

        <textarea name="message" rows="4" placeholder="Write message" wire:model='message'></textarea>
        @error('message')
            <span style="color:white">{{ $message }}</span>
        @enderror

        <a class="btn btn-primary" wire:click='send'>Send</a>

    </form>

</div>
