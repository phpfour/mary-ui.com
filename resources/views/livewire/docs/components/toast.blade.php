<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;
use Mary\Traits\Toast;

new #[Title('Toast')] class extends Component {
    use Toast;

    public function save()
    {
        // Your stuff here ...

        // Toast
        $this->success('We are done, check it out');
    }

    public function save2()
    {
        // Your stuff here ...

        // Toast
        $this->error(
            'It will last just 1 second ...',
            timeout: 1000,
            position: 'toast-bottom toast-start'
        );
    }

    public function save3()
    {
        // Your stuff here ...

        // Toast
        $this->warning(
            'It is working with redirect',
            'You were redirected to another url ...',
            redirectTo: '/docs/components/form'
        );
    }
}
?>

<div class="docs">

    <x-header title="Toast" />

    <x-header title="Usage" size="text-2xl" class="mt-10 mb-5" />

    <p>
        Place <strong>toast tag</strong> somewhere on main layout.
    </p>

    {{--@formatter:off--}}
    <x-code no-render>
        @verbatim('docs')
            <body>
                ...
                <x-toast />  <!-- [tl! highlight .animate-pulse] -->
            </body>
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <p>
        Import <code>Toast</code> trait and call <code>$this->toast(...)</code> method.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
            use Mary\Traits\Toast;

            class MyComponent extends Component
            {
                // Use this trait [tl! highlight:1 .animate-pulse]
                use Toast;

                public function save()
                {
                    // Do your stuff here ...

                    // Toast
                    $this->toast(
                        type: 'success',
                        title: 'It is done!',
                        description: null,                  // optional (text)
                        position: 'toast-top toast-end',    // optional (daisyUI classes)
                        timeout: 3000,                      // optional (ms)
                        redirectTo: null                    // optional (uri)
                    );

                    // Shortcuts
                    $this->success(...);
                    $this->error(...);
                    $this->warning(...);
                    $this->info(...);
                }
            }
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <p>
        For convenience this component flashes the following messages to make testing easier.
    </p>

    <x-code no-render language="php">
        session()->flash('mary.toast.title', $title);
        session()->flash('mary.toast.description', $description);
    </x-code>

    <x-header title="Example" size="text-2xl" class="mt-10 mb-5" />

    <x-code class="grid lg:flex gap-5">
        @verbatim('docs')
            <x-button label="Default" class="btn-success" wire:click="save" spinner />

            <x-button label="Quick" class="btn-error" wire:click="save2" spinner />

            <x-button label="Save and redirect" class="btn-warning" wire:click="save3" spinner />
        @endverbatim
    </x-code>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
            public function save()
            {
                // Your stuff here ...

                // Toast
                $this->success('We are done, check it out');
            }

            public function save2()
            {
                // Your stuff here ...

                // Toast
                $this->error(
                    'It will last just 1 second ...',
                    timeout: 1000,
                    position: 'toast-bottom toast-start'
                );
            }

            public function save3()
            {
                // Your stuff here ...

                // Toast
                $this->warning(
                    'It is working with redirect',
                    'You were redirected to another url ...',
                    redirectTo: '/docs/components/form'
                );
            }
        @endverbatim
    </x-code>
    {{--@formatter:on--}}
</div>