<div>
    <section
        id="home"
        class="w-full flex xl:flex-row flex-col justify-center 
        min-h-screen gab-10 max-container"
    >

    <div
        class="relative xl:w-2/5 flex flex-col justify-center 
        items-start w-full max-xl:padding-x pt-28"
    >
        <p>We are a Dynamic Network</p>
        <h1>
            <span>Connecting</span>
            Business
            <br />
            <span>Communities, and Individuals</span>
        </h1>
        <p>Across the Greater Toronto Area</p>
        
        {{-- CALLING BUTTON COMPONENT ============= --}}
        <livewire:user-panel.component.button 
            label="Register Today" 
            iconURL="register-icon.png" 
            url="/register" 
            color="#4CAF50" 
        />
        {{-- CALLING BUTTON COMPONENT ============= --}}

    </div>
    </section>
</div>
