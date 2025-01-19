


<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5 mt-4 p-5 font-mono">
    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="bg-white shadow-xl overflow-hidden rounded-xl flex flex-col h-full max-w-md w-full hover:scale-105 transform transition duration-300">
            <div class="relative p-3">
                <!-- Image Section -->
                <div class="relative overflow-hidden">
                    <!-- Image Section -->
                    <img class="w-full h-48 object-cover rounded-xl" src="<?php echo e($event['photo_url']); ?>" alt="Festival of Happiness">

                    <!-- Smokey Blue Overlay -->
                    <div class="absolute top-0 left-0 w-full h-full bg-blue-900 opacity-40 rounded-xl"></div> <!-- Adjust opacity as needed -->

                    <!--[if BLOCK]><![endif]--><?php if(!$event['photo_url']): ?>
                        <span class="text-gray-500 italic">No Photo</span>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    <div class="flex flex-col justify-center items-center text-black text-lg p-2 absolute top-2 left-2 bg-white shadow-lg w-14 h-14 rounded-xl">
                        <span class="block text-2xl -mt-2 font-mono text-center font-bold"><?php echo e(\Carbon\Carbon::parse($event['start_date'])->format('j')); ?></span>
                        <span class="block text-lg -mt-1 font-mono text-center"><?php echo e(strtoupper(\Carbon\Carbon::parse($event['start_date'])->format('M'))); ?></span>
                    </div>
                    <div class="flex flex-col justify-center items-center text-black text-lg p-2 absolute top-2 right-2 bg-gray-300 shadow-lg px-2 py-0.5 rounded-lg">
                        <span>$50</span>
                    </div>
                    <!-- Price Tag and Location -->
                    <div class="absolute bottom-0 w-full px-3 py-1.5 flex justify-between items-center bg-black bg-opacity-40 rounded-xl">
                        <!-- Location -->
                        <div class="flex items-center text-white text-sm font-semibold space-x-2">
                            <i class="fa-solid fa-user"></i>
                            <span><?php echo e($event['visibility']); ?> only</span>
                        </div>
                    </div>
                </div>
                


            </div>

            <div class="px-3 py-1 flex-1">
                <!-- Tags -->
                <div class="flex mb-2 text-gray-500">

                    <span class="bg-blue-400 px-4 py-0.5 rounded-lg text-white text-sm font-semibold">Music</span>
                </div>
                <!-- Title -->
                <h2 class="text-lg font-bold text-gray-900 mb-1"><?php echo e($event['title']); ?></h2>

                <!-- Venue -->
                <div class="pl-2 flex flex-col space-y-2">
                    <div class="flex space-x-2 items-center  text-sm ">
                        <i class="fa-solid fa-location-dot w-4 h-4 text-gray-600"></i>
                        <span class="text-black"><?php echo e($event['location']); ?></span>
                    </div>
                    <div class="flex space-x-2 items-center  text-sm ">
                        <i class="fa-solid fa-calendar w-4 h-4 text-gray-600"></i>
                        <span class="text-black"><?php echo e(\Carbon\Carbon::parse($event['start_date'])->format('F jS, Y')); ?></span>
                    </div>
                    <div class="flex space-x-2 items-center  text-sm ">
                        <i class="fa-solid fa-clock w-4 h-4 text-gray-600"></i>
                        <span class="text-black"><?php echo e(\Carbon\Carbon::parse($event['start_time'])->format('g:i A')); ?> to <?php echo e(\Carbon\Carbon::parse($event['end_time'])->format('g:i A')); ?></span>
                    </div>

                </div>
            </div>

            <div class="flex items-center justify-between p-4 border-t mt-auto">

                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('components.button-comp.button', ['type' => 'edit','icon' => 'true','id' => ''.e($event['id']).'']);

$__html = app('livewire')->mount($__name, $__params, 'lw-1214953756-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

                <!-- Delete (Red) -->
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('components.button-comp.button', ['type' => 'delete','icon' => 'true','id' => ''.e($event['id']).'']);

$__html = app('livewire')->mount($__name, $__params, 'lw-1214953756-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <a href="<?php echo e(route('event-view', ['eventId' => $event['id']])); ?>"
                   class="text-sky-500 hover:text-sky-300 text-lg  flex justify-center items-center p-1 rounded-lg ">
                    <i class="fas fa-info-circle p-0.5"></i>
                </a>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
</div>

<?php /**PATH /home/saai/Documents/Work/OurOWn/github/CGTA-CLUB/resources/views/livewire/pages/events/event-comp/event-card.blade.php ENDPATH**/ ?>