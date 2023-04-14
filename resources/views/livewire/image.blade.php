<div>
<div class="-mx-3 md:flex mb-4">
            <div class="md:w-full px-3 py-4">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="pic">
                  Upload Image
                </label>
                <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="pic" name="pic" type="file" wire:model="image">
              </div>
            </div>

            @if ($image)
            <img class="w-36" src="{{ $image->temporaryUrl() }}" />
        @endif
</div>
