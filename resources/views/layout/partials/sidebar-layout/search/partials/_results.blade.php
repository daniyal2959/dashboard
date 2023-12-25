<!--begin::Recently viewed-->
<div data-kt-search-element="results" class="d-none">
	<!--begin::Items-->
	<div class="scroll-y mh-200px mh-lg-350px" id="showResults">

	</div>
	<!--end::Items-->
</div>
<!--end::Recently viewed-->

@push('scripts')
    <script>
        document.addEventListener('searched', () => {
            const items = searchResult.data;
            const showResults = document.querySelector('#showResults');
            showResults.innerHTML = '';

            for (const item of items) {
                let avatarWrapper;

                if( item.profile_photo_url ) {
                    avatarWrapper = `<img src="${item.profile_photo_url}" class="rounded-3" alt="user" />`;
                }
                else{
                    avatarWrapper = `
                        <div class="symbol-label fs-3 {{ app(\App\Actions\GetThemeType::class)->handle('bg-light-? text-?') }}">
                            ${item.name.substring(0, 1)}
                        </div>
                    `;
                }
                const data = `
                    <!--begin::Item-->
                    <a href="/dashboard/users/${item.id}" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40px me-4">
                            ${avatarWrapper}
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Title-->
                        <div class="d-flex flex-column justify-content-start fw-semibold">
                            <span class="fs-6 fw-semibold">${item.name}</span>
                            <span class="fs-7 fw-semibold text-muted">${item.email}</span>
                        </div>
                        <!--end::Title-->
                    </a>
                    <!--end::Item-->
                `;

                showResults.insertAdjacentHTML('beforeend', data);
            }
        }, false)
    </script>
@endpush
