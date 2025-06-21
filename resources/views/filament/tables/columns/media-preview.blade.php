
@php
    $record = $getRecord();
    $media = $record instanceof \App\Models\Media ? $record : $record->media;
    $isImage = str_starts_with($media->type, 'image');
    $mediaUrl = Storage::url($media->file_path);

@endphp

<div style="width: 80px; height: 80px;">
    <div 
        x-data="{ showModal: false }" 
        @keydown.window.escape="showModal = false"
        class="cursor-pointer w-full h-full"
    >
        <div @click.stop="showModal = true" class="w-full h-full">
            @if ($isImage)
                <img 
                    src="{{ $mediaUrl }}" 
                    alt="preview" 
                    class="rounded-md hover:brightness-110 transition w-full h-full object-cover"
                >
            @else
                <video 
                    muted 
                    loop 
                    playsinline 
                    preload="metadata"
                    class="rounded-md hover:brightness-110 transition w-full h-full object-cover"
                    @mouseenter="event.target.play()" 
                    @mouseleave="event.target.pause()"
                >
                    <source src="{{ $mediaUrl }}" type="video/mp4">
                </video>
            @endif
        </div>

        <!-- Modal -->
        <div 
            x-show="showModal"
            x-cloak
            x-transition
            class="fixed inset-0 bg-black/70 z-50 flex items-center justify-center p-4"
        >
            <div class="relative bg-white rounded-xl shadow-xl max-w-4xl w-full max-h-[90vh] overflow-auto">
                <button 
                    @click="showModal = false" 
                    class="absolute top-2 right-3 text-gray-600 hover:text-black text-2xl"
                >
                    &times;
                </button>

                <div class="p-4 flex items-center justify-center">
                    @if ($isImage)
                        <img 
                            src="{{ $mediaUrl }}" 
                            alt="full-preview" 
                            class="rounded-lg object-contain max-h-[75vh] max-w-full mx-auto"
                        >
                    @else
                        <video 
                            src="{{ $mediaUrl }}" 
                            controls 
                            muted
                            preload="metadata"
                            class="rounded-lg object-contain max-h-[75vh] max-w-full mx-auto"
                        >
                            Your browser does not support the video tag.
                        </video>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
