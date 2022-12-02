<div>

    <form class="contact_form" >
        <div class="form_name">
            <input type="text" name="full_name" placeholder="Full Name" wire:model='full_name'>
        </div>
       @error('full_name')
       <span>{{ $message }}</span>
       @enderror
        <input type="email" name="email" placeholder="Email" wire:model='email'>
      @error('email')
      <span>{{ $message }}</span>
      @enderror

        <textarea name="message" rows="4" placeholder="Write message" wire:model='message'></textarea>
        @error('message')
        <span>{{ $message }}</span>

        @enderror

        <a class="btn btn-primary" wire:click='send'>Send</a>

    </form>

</div>
