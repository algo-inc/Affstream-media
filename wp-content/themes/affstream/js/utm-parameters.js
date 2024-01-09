function saveADParamsToLocalStorage() {
  const PageUrl = window.location.href;
  const savedUrl = localStorage.getItem('LandingPageUrl');
  if (!savedUrl) {
    localStorage.setItem('LandingPageUrl', PageUrl);
  }
  const params = new URLSearchParams(window.location.search);
  const adParams = {
    UtmSource: params.get('utm_source'),
    UtmMedium: params.get('utm_medium'),
    UtmCampaign: params.get('utm_campaign'),
    UtmContent: params.get('utm_content'),
    UtmTerm: params.get('utm_term')
  };

  const filteredAdParams = {};
  Object.keys(adParams).filter(key => !!adParams[key]).forEach(key => filteredAdParams[key] = adParams[key]);

  if(Object.values(filteredAdParams).length) {
    localStorage.setItem('AD_params', JSON.stringify(filteredAdParams));
  }
}
saveADParamsToLocalStorage();
