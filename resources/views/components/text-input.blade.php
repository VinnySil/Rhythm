@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-[#FF73A6] dark:focus:border-[#FF73A6] focus:ring-[#FF73A6] dark:focus:ring-[#FF73A6] rounded-md shadow-sm']) }}>
