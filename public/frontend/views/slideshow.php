
<link rel="stylesheet" href="../frontend/css/styles.css">

<div class="container slider" >

    <a class="arrow prev" ng-click="nextSlide()"></a>


    <img ng-repeat="slide in slides" class="slide slide-animation nonDraggableImage"
         ng-swipe-right="nextSlide()" ng-swipe-left="prevSlide()"
         ng-hide="!isCurrentSlideIndex($index)" ng-src="{{slide.image}}">

    
    <a class="arrow next" ng-click="prevSlide()"></a>
    <nav class="nav modifiedNav">
        <div class="wrapper">
            <ul class="dots">
                <li class="dot" ng-repeat="slide in slides">
                    <a ng-class="{'active':isCurrentSlideIndex($index)}" ng-click="setCurrentSlideIndex($index);">{{slide.description}}</a>
                </li>
            </ul>
        </div>
    </nav>
</div>

