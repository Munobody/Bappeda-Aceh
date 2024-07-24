<!-- resources/views/components/loading.blade.php -->
<div id="loading-spinner" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 z-50">
    <span class="loading loading-infinity loading-lg"></span>
</div>

<style>
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .loading {
        border: 4px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        border-top: 4px solid #fff; /* Spinner color */
        width: 40px;
        height: 40px;
        animation: spin 1s linear infinite;
    }

    .loading-infinity {
        border-width: 4px;
    }

    .loading-lg {
        width: 64px;
        height: 64px;
    }
</style>
