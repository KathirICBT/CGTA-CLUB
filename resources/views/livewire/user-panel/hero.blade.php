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
        
        {{-- CALLING BUTTON COMPONENT - WITH TEXT COLOR ============= --}}
        {{-- <livewire:user-panel.component.button 
            label="Register Today" 
            iconURL="register-icon.png" 
            url="/register" 
            color="#4CAF50" 
            textColor="#ffffff" 
        /> --}}

        {{-- CALLING BUTTON COMPONENT - AUTO TEXT COLOR ============= --}}
        {{-- <livewire:user-panel.component.button 
            label="Register Today" 
            iconURL="register-icon.png" 
            url="/register" 
            color="#4CAF50" 
        /> --}}

        {{-- CALLING BUTTON COMPONENT - AUTO TEXT COLOR - font awesome ICON ============= --}}
        {{-- <livewire:user-panel.component.button 
            label="Register Today" 
            icon="fa-solid fa-user" 
            url="/register" 
            color="#d1fdff" 
        /> --}}


        {{-- CALLING BUTTON COMPONENT - AUTO TEXT COLOR - WITH ALT MESSAGE ============= --}}
        <livewire:user-panel.component.button 
            label="Register Today" 
            iconURL="cgta-register-icon.png" 
            iconAlt="CGTA Register Icon" 
            url="/register" 
            color="#4CAF50" 
        />
        {{-- CALLING BUTTON COMPONENT ============= --}}

    </div>
    </section>
</div>
