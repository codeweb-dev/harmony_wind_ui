import './bootstrap';
import 'highlight.js/styles/dark.css';
import hljs from 'highlight.js/lib/core';
import ClipboardJS from 'clipboard';
import javascript from 'highlight.js/lib/languages/javascript';
import html from 'highlight.js/lib/languages/xml';

hljs.registerLanguage('javascript', javascript);
hljs.registerLanguage('html', html);

document.addEventListener('livewire:navigated', () => {
    document.querySelectorAll('pre code').forEach((block) => {
        hljs.highlightElement(block);
    });

    const clipboard = new ClipboardJS('.copy-button');

    clipboard.on('success', function(e) {
        e.clearSelection();

        // Show check icon and hide clipboard icon
        const checkIcon = document.getElementById('checkIcon');
        const copyIcon = document.getElementById('copyIcon');

        checkIcon.classList.remove('hidden');
        copyIcon.classList.add('hidden');

        // Hide check icon after 2 seconds
        setTimeout(() => {
            checkIcon.classList.add('hidden');
            copyIcon.classList.remove('hidden');
        }, 2000);
    });

    clipboard.on('error', function(e) {
        console.error('Copy failed:', e);
    });
});

