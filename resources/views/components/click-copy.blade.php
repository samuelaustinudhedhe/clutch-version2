
<span x-data="{ copied: false }" class="cursor-pointer" @click="navigator.clipboard.writeText('{{ $text }}').then(() => { copied = true; setTimeout(() => copied = false, 2000); })">
    {{ $slot }}
    <span x-show="copied" class="text-green-500 ml-2">Copied!</span>
</span>