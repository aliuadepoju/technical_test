from django.urls import path, include
from rest_framework.routers import DefaultRouter
from numberplatesgenerator import views
router = DefaultRouter()
router.register("api/v1", views.ViewPlateNumbers,
                base_name='viewNumberPlates')


urlpatterns = [
    path('', include(router.urls)),
    path('login', views.login_page, name='login'),
    path('generator', views.number_plate_generator_page, name='generator'),
    path('report', views.report_page, name='report'),
]
