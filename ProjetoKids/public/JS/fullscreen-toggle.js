(function () {
  function isBrowserFullscreen() {
    // detecta Fullscreen API ou quando o navegador entrou em tela cheia (F11)
    return !!(document.fullscreenElement || document.webkitFullscreenElement || document.mozFullScreenElement || document.msFullscreenElement)
      || Math.abs(window.innerHeight - screen.height) <= 2;
  }

  function applyFullscreenClass() {
    if (isBrowserFullscreen()) {
      document.body.classList.add('fullscreen');
    } else {
      document.body.classList.remove('fullscreen');
    }
  }

  // eventos: Fullscreen API, resize (F11 muda o tamanho) e keydown (F11)
  document.addEventListener('fullscreenchange', applyFullscreenClass);
  document.addEventListener('webkitfullscreenchange', applyFullscreenClass);
  document.addEventListener('mozfullscreenchange', applyFullscreenClass);
  document.addEventListener('MSFullscreenChange', applyFullscreenClass);
  window.addEventListener('resize', () => setTimeout(applyFullscreenClass, 50));
  window.addEventListener('keydown', (e) => {
    if (e.key === 'F11') setTimeout(applyFullscreenClass, 100);
  });

  // aplicar no carregamento
  applyFullscreenClass();
})();