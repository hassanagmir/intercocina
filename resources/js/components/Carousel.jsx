import React, { useState } from 'react';
import { Swiper, SwiperSlide } from 'swiper/react';
import { Navigation, Pagination, Autoplay, Thumbs } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import 'swiper/css/thumbs';

const Carousel = ({ images }) => {
  const [thumbsSwiper, setThumbsSwiper] = useState(null);
  const [activeIndex, setActiveIndex] = useState(0);

  return (
    <div>
      {/* Main Carousel */}
      <Swiper
        modules={[Navigation, Pagination, Autoplay, Thumbs]}
        spaceBetween={10}
        slidesPerView={1}
        navigation
        // pagination={{ clickable: true }}
        autoplay={{ delay: 3000 }}
        loop={true}
        thumbs={{ swiper: thumbsSwiper }}
        onSlideChange={(swiper) => setActiveIndex(swiper.realIndex)}
      >
        {images.map((image, index) => (
          <SwiperSlide key={index}>
            <img
              src={image}
              className='lazy-image max-lg:mx-auto rounded-2xl m-auto max-h-[550px] mt-0 loaded'
              alt={`Product ${index + 1}`}
            />
          </SwiperSlide>
        ))}
      </Swiper>

      {/* Thumbnails Carousel */}
      <Swiper
        modules={[Thumbs]}
        spaceBetween={10}
        slidesPerView={4}
        onSwiper={setThumbsSwiper}
        watchSlidesProgress
        style={{ padding: '10px' }}
      >
        {images.map((image, index) => (
          <SwiperSlide key={index}>
            <img
              src={image}
              alt={`Thumbnail ${index + 1}`}
              style={{ 
                width: '100%', 
                height: 'auto', 
                borderRadius: '4px', 
                cursor: 'pointer',
                border: activeIndex === index ? '2px solid red' : '2px solid transparent',
                boxSizing: 'border-box'
              }}
            />
          </SwiperSlide>
        ))}
      </Swiper>
    </div>
  );
};

export default Carousel;